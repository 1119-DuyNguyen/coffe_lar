<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ProductReceipt;
use App\Models\Provider;
use App\Models\Receipt;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Livewire\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Actions\Action;

class ImportReceipt extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];
    public Receipt $receipt;

    public function mount(): void
    {
        if (isset($this->receipt)) {
            $data = array_merge($this->receipt->attributesToArray(), [
                'product_receipt' =>
                    $this->receipt->productReceipt->toArray()
//                    [
//                        ['product_id' => 1, 'quantity' => 4],
//                        ['product_id' => 2, 'quantity' => 4]
//                    ]
            ]);
            $this->form->fill($data);
        } else {
            $this->form->fill();
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('name')->label('Tiêu đề phiếu nhập')
                            ->required(),
                        Select::make('provider_id')
                            ->relationship(name: 'provider', titleAttribute: "name")
//                            ->searchable(['name'])
                            ->label('Nhà cung cấp')
                            ->required()
                        ,
                        Repeater::make('product_receipt')
                            ->label("Sản phẩm nhập")
                            ->schema([
                                // Two fields in each row: product and quantity
                                Select::make('product_id')
                                    ->relationship('products', 'name')
                                    // Disable options that are already selected in other rows
                                    //https://filamentphp.com/docs/3.x/forms/fields/repeater#using-get-to-access-parent-field-values
                                    ->disableOptionWhen(function ($value, $state, Get $get) {
                                        return collect($get('../*.product_id'))
                                            ->reject(fn($id) => $id == $state)
                                            ->filter()
                                            ->contains($value);
                                    })
                                    ->required()
                                    ->label('Sản phẩm')
                                    ->columnSpan(2)

                                ,
                                TextInput::make('quantity')->label('Số lượng')
                                    ->integer()
                                    ->default(1)
                                    ->minValue(0)
                                    ->required(),
                                TextInput::make('price')->label('Giá (đồng)')
                                    ->integer()
                                    ->minValue(0)
                                    ->default(1000)
                                    ->step(1000)
                                    ->required()
                            ])
                            // Repeatable field is live so that it will trigger the state update on each change
                            ->live()
                            ->debounce()
                            // After adding a new row, we need to update the totals
                            ->afterStateUpdated(function (Get $get, Set $set) {
                                self::updateTotals($get, $set);
                            })

                            // After deleting a row, we need to update the totals
                            ->deleteAction(
                                fn(Action $action) => $action->after(
                                    fn(Get $get, Set $set) => self::updateTotals($get, $set)
                                ),
                            )
                            // Disable reordering
                            ->reorderable(false)
                            ->columns(2)
                            ->model(Receipt::class)
                            ->defaultItems(1),
                        Section::make()->schema(
                            [
                   
                                TextInput::make('total_quantity')
                                    ->label('Tổng số lượng sản phẩm nhập')
                                    ->readOnly()
                                    ->placeholder('Tự động tính toán khi nhập sản phẩm')
                                ,
                                TextInput::make('total_price')
                                    ->label('Tổng số lượng sản phẩm nhập')
                                    ->readOnly()
                                    ->placeholder('Tự động tính toán khi nhập sản phẩm')
                            ]
                        )->columns(2)

                    ]),


            ])
            ->statePath('data')
            ->model(Receipt::class);
    }

    public function edit(Request $request): void
    {
        $request->merge($this->form->getState());
        $this->receipt->update($request->all());
        Notification::make()
            ->title('Cập nhập phiếu nhập thành công')
            ->success()
            ->send();
    }

    public function create(Request $request): void
    {
        $request->merge($this->form->getState());
        Receipt::create($request->all());
        Notification::make()
            ->title('Lưu phiếu nhập thành công')
            ->success()
            ->send();
        $this->form->fill();
    }

    public function render()
    {
        return view('livewire.import-receipt');
    }

    // This function updates totals based on the selected products and quantities
    public static function updateTotals(Get $get, Set $set): void
    {
        // Retrieve all selected products and remove empty rows
        $selectedProducts = collect($get('product_receipt'))->filter(
            fn($item) => !empty($item['product_id']) && !empty($item['quantity'])
        );


        // Calculate subtotal based on the selected products and quantities
        $subtotal = $selectedProducts->reduce(function ($subtotal, $product) {
            return $subtotal + $product['quantity'];
        }, 0);
        $subPrice = $selectedProducts->reduce(function ($subPrice, $product) {
            return $subPrice + $product['price'];
        }, 0);
        $set('total_quantity', $subtotal);
        $set('total_price', $subPrice);
    }
}
