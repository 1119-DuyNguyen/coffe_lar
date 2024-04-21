<?php

namespace App\Livewire;


use Filament\Forms\Components\DatePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Filament\Notifications\Notification;
use Livewire\Component;

abstract class IndexDataTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    protected string $buttonEditRoute = "";
    protected string $buttonDeleteRoute = "";
    protected string $buttonPrintRoute = "";


    abstract protected function datasource(): Builder;

    abstract protected function getColumns(): array;

    protected function getAnotherBtnActions(): array
    {
        return [];
    }

    protected function getActionBtns()
    {
        $actionBtn = [];
        if (!empty($this->buttonEditRoute)) {
            $actionBtn[] = Action::make('edit')
                ->label("")
                ->button()
                ->url(fn($record): string => route($this->buttonEditRoute, $record))
                ->openUrlInNewTab()
                ->color('info')
                ->tooltip("Sửa")
                ->icon('heroicon-o-pencil-square');
        }
        if (!empty($this->buttonDeleteRoute)) {
            $actionBtn[] = DeleteAction::make('delete')
                ->modalHeading(
                    fn($record): string => __('filament-actions::delete.single.modal.heading', ['label' => "tài nguyên"]
                    )
                )
                ->label("")
                ->tooltip("Xóa")
                ->button()
//                ->url(fn($record): string => route($this->buttonDeleteRoute, $record))
//                ->openUrlInNewTab()
                ->color('danger')
                ->icon('heroicon-o-trash');
        }
        if (!empty($this->buttonPrintRoute)) {
            $actionBtn[] = Action::make('print')
                ->label("")
                ->button()
                ->url(fn($record): string => route($this->buttonPrintRoute, $record))
                ->openUrlInNewTab()
                ->color('warning')
                ->tooltip("In")
                ->icon('heroicon-o-printer');
        }
        return array_merge($this->getAnotherBtnActions(), $actionBtn);
    }

    private function addDynamicEventColumns(array $columns)
    {
//        foreach ($columns as $a) {
//            if ($a instanceof ToggleColumn) {
//                $a->afterStateUpdated(function ($record, $state) {
//                    Notification::make()
//                        ->title('Cập nhập thành công')
//                        ->success()
//                        ->send();
//                });
//            }
//        }
        return $columns;
    }

    public function table(Table $table): Table
    {
        $tableBuilder = $table
            ->query(
                $this->datasource()
            )
            ->columns($this->addDynamicEventColumns($this->getColumns()))
            ->actions($this->getActionBtns())
            ->bulkActions([
                // ...
            ])
            ->filters($this->getDataTableFilters())
            ->emptyStateHeading("Không tìm thấy dữ liệu")
            ->persistSortInSession();

        return $tableBuilder;
    }

    public function render(): View
    {
        return view('livewire.index-data-table');
    }

    protected function shouldPersistTableFiltersInSession(): bool
    {
        return true;
    }

    protected function getDataTableFilters(): array
    {
        return [
        ];
    }
}
