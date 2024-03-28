<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductReport;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\Summarizers\Count;
use Filament\Tables\Columns\Summarizers\Range;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\Summarizers\Summarizer;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Filament\Tables\Grouping\Group;

class ProductQuantityStatisticsTable extends Component implements HasForms, HasTable
{

    use InteractsWithTable;
    use InteractsWithForms;

    public $typeStatistic = 2;

    protected $listeners = ['refreshTable' => '$refresh'];
    private $messageGroupBy = "";

    protected function queryString()
    {
        return [
            'typeStatistic' => [
                'as' => 'statistic',
            ],

        ];
    }

    public function getTableRecordKey(Model $record): string
    {
        return 'product_id';
    }

    private function getStatisticQueryBuilder(Builder $builder): Builder
    {
        $builder->select(
            "product_id",
        );

        switch ($this->typeStatistic) {
            case 2:
                $builder->selectRaw("DATE_FORMAT(created_at,'%m-%Y') as time ");
                $this->messageGroupBy = "Tháng";
                break;
            case 3:
                $builder->selectRaw(
                    "CONCAT( QUARTER(created_at),'-',YEAR(created_at)) as time "
                );

                $this->messageGroupBy = "Quý";

                break;
            case 1:
                $builder->selectRaw('year(created_at) as time');
                $this->messageGroupBy = "Năm";


                break;
            default:
                return $builder;
        }
        return $builder->selectRaw(
            'sum(total_sale) as total_sale, sum(total_receipt) as total_receipt, '
            . 'sum(price_sale) as price_sale, sum(price_receipt) as price_receipt,'
            . 'sum(price_sale)- sum(price_receipt) as profit'
        )->groupBy(
            'time',
            'product_id',
        );;
    }

    private function getStatisticGroupByBuilder(Table $tableBuilder): Table
    {
        $tableBuilder->defaultGroup(
            Group::make('time')
                ->getKeyFromRecordUsing(
//                    fn(Product $model): string => dd($model->time)
                    fn(ProductReport $model): string => $model->time

                )

                // Ex: "September 2023"
                ->getTitleFromRecordUsing(
                    fn(ProductReport $model): string => $this->messageGroupBy . " " . $model->time
                )
                ->titlePrefixedWithLabel(false)
                ->collapsible()


        )->defaultSort('time', 'desc');
        return $tableBuilder;
    }


    public function refreshDataTable()
    {
        $this->dispatch('refreshTable');
    }

    public function table(Table $table): Table
    {
        $queryBuilder = $this->getStatisticQueryBuilder(ProductReport::query()->with('product'));
        $tableBuilder = $table
            ->paginated(false)
            ->query(
                $queryBuilder

            )
            ->columns([
                TextColumn::make('product.name')->label('Sản phẩm'),

//                TextColumn::make('product.name')->label('Sản phẩm'),
                TextColumn::make('total_sale')->label('Số lượng bán ra')->summarize(Sum::make()),
                TextColumn::make('price_sale')->money('VND')->label('Tiền bán ra (+)')->summarize(
                    Sum::make()->money('VND')
                ),
                TextColumn::make('total_receipt')->label('Số lượng nhập')->summarize(Sum::make()),
                TextColumn::make('price_receipt')->money('VND')->label('Tiền nhập (-)')->summarize(
                    Sum::make()->money('VND')
                ),

                TextColumn::make('profit')->money('VND')->label('Lợi nhuận')->summarize(Sum::make()->money('VND'))


//                TextColumn::make('product_id')->label('Lợi nhuận ( đợi nhập hàng)'),
            ])
            ->actions([])
            ->bulkActions([
                // ...
            ]);

        $formFilter = [
        ];
        if ($this->typeStatistic >= 2) {
            $formFilter[] = TextInput::make('created_from')
                ->label('Năm')
                ->numeric()
                ->minValue(1945)
                ->maxValue(
                    Carbon::now()->year
                );
            $tableBuilder->filters([
                Filter::make('created_at')
                    ->form($formFilter)
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            );
                    })
                // ...
            ]);
        }
        return $this->getStatisticGroupByBuilder($tableBuilder);
    }

    public function render(): View
    {
        return view('livewire.product-quantity-statistics-table');
    }
}
