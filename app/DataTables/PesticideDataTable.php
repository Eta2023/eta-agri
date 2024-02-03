<?php

namespace App\DataTables;

use App\Models\Pesticide;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PesticideDataTable extends DataTable
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
            $editBtn = "<a href='" . route('pesticides-admin.edit', $query->id) . "' class='btn btn-success mr-2''><i class='far fa-edit'></i></a>";
            $deleteBtn = "<a href='" . route('pesticides-admin.destroy', $query->id) . "' class='btn btn-danger my-2 delete-item mr-2''><i class='fas fa-trash-alt'></i></a>";
            $connBtn = "<a href='". route('pesticides-admin.createConnection', $query->id) ." ' class='btn btn-primary my-2 connection-item'><i class='fas fa-link'></i></a>";
        
            return $editBtn. $deleteBtn. $connBtn; // Added a space between buttons for separation
            //   return $editBtn. $deleteBtn;
        })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    
    public function query(Pesticide $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('pesticide-table')
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
            Column::make('description'),
            Column::make('license_number'),

            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(220)
                  ->addClass('text-center'),
         
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Pesticide_' . date('YmdHis');
    }
}
