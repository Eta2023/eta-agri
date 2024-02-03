<?php

namespace App\DataTables;

use App\Models\Company;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CompanyDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action',function ($query) {
                $editBtn = "<a href='" . route('companies-admin.edit', $query->id) . "' class='btn btn-success mr-2''><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='" . route('companies-admin.destroy', $query->id) . "' class='btn btn-danger my-2 delete-item'><i class='fas fa-trash-alt'></i></a>";

                return $editBtn . $deleteBtn;
            } )
            ->addColumn('logo', function ($query) {
                return "<img width='100px' src='" . asset($query->logo) . "'></img>";
            })
            ->rawColumns(['action','logo'])
            ->setRowId('id');
    }

  
    /**
     * Get the query source of dataTable.
     */
    public function query(Company $model): QueryBuilder
    {
        return $model->newQuery()->with('type');
    }
    

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('company-table')
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

            Column::make('nameAr'),
            Column::make('nameEng'),
            Column::make('mobile'),
            Column::make('email'),
            Column::make('location'),
            Column::make('logo'),

            // Column::make('type.nameAr')
            //     ->title('type name-Ar')
            //     ->searchable(true)
            //     ->orderable(true),
            

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
        return 'Company_' . date('YmdHis');
    }
}
