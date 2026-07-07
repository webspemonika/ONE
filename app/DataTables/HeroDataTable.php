<?php

namespace App\DataTables;

use App\Models\Hero;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class HeroDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Hero> $query Results from query() method.
     */
  public function dataTable(QueryBuilder $query): EloquentDataTable
{
    return (new EloquentDataTable($query))
        ->addIndexColumn()

        ->editColumn('hero_img', function ($query) {
    return '<img src="' . asset($query->hero_img) . '" style="object-fit:cover; border-radius:5px; width:100px; height:100px;">';
})

->editColumn('profile_dark_img', function ($query) {
    return '<img src="' . asset($query->profile_dark_img) . '" style="object-fit:cover; border-radius:5px; width:100px; height:100px;">';
})

->editColumn('profile_light_img', function ($query) {
    return '<img src="' . asset($query->profile_light_img) . '" style="object-fit:cover; border-radius:5px; width:100px; height:100px;">';
})
 ->addColumn('action', function ($query) {
    dd($query->id);
})

        ->rawColumns([
            'hero_img',
            'profile_dark_img',
            'profile_light_img',
            'action'
        ]);
}
    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Hero>
     */
    public function query(Hero $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('hero-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
            Button::make('csv'),
            Button::make('pdf'),
            Button::make('print'),
            Button::make('reset'),
            Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')
                    ->title('SL')
                    ->searchable(false)
                    ->orderable(false),
            Column::make('greeting_text'),
            Column::make('title'),
            Column::make('description'),
            Column::make('hero_img'),
            Column::make('profile_dark_img'),
            Column::make('profile_light_img'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(100)
                  ->addClass('text-center'),

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Hero_' . date('YmdHis');
    }
}
