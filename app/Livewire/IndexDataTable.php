<?php

namespace App\Livewire;


use App\Models\Receipt;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

abstract class IndexDataTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    protected string $buttonEditRoute = "";
    protected string $buttonDeleteRoute = "";

    abstract protected function datasource(): Builder;

    abstract protected function getColumns(): array;

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
                ->icon('heroicon-o-pencil-square');
        }
        if (!empty($this->buttonDeleteRoute)) {
            $actionBtn[] = Action::make('delete')
                ->label("")
                ->button()
                ->url(fn($record): string => route($this->buttonDeleteRoute, $record))
                ->openUrlInNewTab()
                ->color('danger')
                ->icon('heroicon-o-trash');
        }
        return $actionBtn;
    }


    public function table(Table $table): Table
    {
        $tableBuilder = $table
            ->query(
                $this->datasource()
            )
            ->columns($this->getColumns())
            ->actions($this->getActionBtns())
            ->bulkActions([
                // ...
            ]);

        return $tableBuilder;
    }

    public function render(): View
    {
        return view('livewire.index-data-table');
    }
}
