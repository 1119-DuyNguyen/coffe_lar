<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Provider;
use App\Models\Receipt;
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
use Filament\Actions\Action;

class ImportReceipt extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];
    public Receipt $receipt;

    public function mount(Receipt $receipt): void
    {
        $this->receipt = $receipt;
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        $products = Product::get();
        $receipt = $this->receipt;

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

                        TextInput::make('total')
                            ->label('Tổng số lượng sản phẩm nhập')
                            ->readOnly()
                            ->placeholder('Tự động tính toán khi nhập sản phẩm')
                        ,
                        Repeater::make('product_receipt')
                            ->label("Sản phẩm nhập")
                            ->schema([
                                // Two fields in each row: product and quantity
                                Select::make('product_id')
                                    ->relationship('products', 'name')
//                                    ->options(
//                                        $products->mapWithKeys(function (Product $product) {
//                                            return [
//                                                $product->id => sprintf(
//                                                    '%s',
//                                                    $product->name,
//                                                )
//                                            ];
//                                        })
//                                    )
                                    // Disable options that are already selected in other rows
                                    //https://filamentphp.com/docs/3.x/forms/fields/repeater#using-get-to-access-parent-field-values
                                    ->disableOptionWhen(function ($value, $state, Get $get) {
                                        return collect($get('../*.product_id'))
                                            ->reject(fn($id) => $id == $state)
                                            ->filter()
                                            ->contains($value);
                                    })
                                    ->required()
                                    ->label('Sản phẩm'),
                                TextInput::make('quantity')->label('Số lượng')
                                    ->integer()
                                    ->default(1)
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
                                fn($action) => $action->after(fn(Get $get, Set $set) => self::updateTotals($get, $set)),
                            )
                            // Disable reordering
                            ->reorderable(false)
                            ->columns(2)
                            ->model($receipt)
                    ])
                ,


            ])
            ->statePath('data')
            ->model($this->receipt);
    }


    public function create(Request $request): void
    {
        $request->merge($this->form->getState());

        Receipt::create($request->all());
        Notification::make()
            ->title('Lưu phiếu nhập thành công')
            ->warning()
            ->duration(1000)
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
//        dd($get('product_receipt'));

        $selectedProducts = collect($get('product_receipt'))->filter(
            fn($item) => !empty($item['product_id']) && !empty($item['quantity'])
        );

        // Retrieve prices for all selected products

        // Calculate subtotal based on the selected products and quantities
        $subtotal = $selectedProducts->reduce(function ($subtotal, $product) {
            return $subtotal + $product['quantity'];
        }, 0);

        // Update the state with the new values
//        $set('subtotal', number_format($subtotal, 2, '.', ''));
        $set('total', $subtotal);
    }
}
