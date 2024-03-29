<?php

namespace App\DataTables;

use App\Models\Species;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SpeciesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $mediaBtn = "<a href='" . route('showDetails', ['id' => $query->id]) . "' class='btn btn-info my-2 mr-2''><i class='far fa-exclamation'></i></a>";
                $editBtn = "<a href='" . route('species-admin.edit', $query->id) . "' class='btn btn-success mr-2''><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='" . route('species-admin.destroy', $query->id) . "' class='btn btn-danger my-2 delete-item'><i class='fas fa-trash-alt'></i></a>";

                return $mediaBtn.$editBtn . $deleteBtn;
            })
            ->addColumn('image', function ($query) {
                return "<img width='100px' src='" . asset($query->image) . "'></img>";
            })
            ->addColumn('verification', function ($query) {
                if (  $query->verification== 'verified') {
                    return "<span class='badge bg-label-info'>Verified</span>";
                } else if($query->verification== 'unverified') {
                    return "<span class='badge bg-label-danger'>Unverified</span>";
                }
                
            })
            ->rawColumns(['action','image','verification'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Species $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('species-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
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
            Column::make('name'),
            Column::make('manufacture_company'),
            Column::make('license_number'),
            Column::make('image'),
            Column::make('verification'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Species_' . date('YmdHis');
    }
}
