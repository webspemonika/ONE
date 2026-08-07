<?php

namespace App\DataTables;

use App\Models\Feature;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;

class FeatureDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Feature> $query Results from query() method.
     */
  public function dataTable(QueryBuilder $query): EloquentDataTable
{
    return (new EloquentDataTable($query))
        ->addIndexColumn()

        ->editColumn('feature_icon', function ($query) {
            return '<img src="'.asset($query->feature_icon).'" style="object-fit:cover;width:100px;height:100px;border-radius:5px;">';
        })

        ->editColumn('feature_description', function ($row) {
            return Str::limit(strip_tags($row->feature_description), 80);
        })

        ->addColumn('action', function ($query) {
            return '<a href="'.route('admin.feature.edit', $query->id).'" class="btn btn-secondary">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a href="'.route('admin.feature.destroy', $query->id).'" class="btn btn-danger delete-item">
                        <i class="fas fa-trash"></i>
                    </a>';
        })

        ->rawColumns(['feature_icon', 'action']);
}
// use Illuminate\Support\Str;


/**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Feature>
     */
    public function query(Feature $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('feature-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1, 'desc')
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

    Column::make('feature_title'),
    Column::make('feature_description'),
    Column::make('feature_icon'),

    Column::computed('action')
        ->exportable(false)
        ->printable(false)
        ->width(200)
        ->addClass('text-center'),
        ];

    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Feature_' . date('YmdHis');
    }
}
