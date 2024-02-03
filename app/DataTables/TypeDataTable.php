<?php

namespace App\DataTables;

use App\Models\Type;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TypeDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action',  function ($query) {
                $editBtn = "<a href='" . route('types-admin.edit', $query->id) . "' class='btn btn-success mr-2''><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='" . route('types-admin.destroy', $query->id) . "' class='btn btn-danger my-2 delete-item'><i class='fas fa-trash-alt'></i></a>";
                return $editBtn . $deleteBtn;
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
  
    public function query(Type $model): QueryBuilder
{
    return $model->newQuery()->with('genus');
}


    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('type-table')
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
            Column::make('note'),
            Column::make('genus.nameAr')
                ->title('Genus name-Ar')
                ->searchable(true)
                ->orderable(true),

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
        return 'Type_' . date('YmdHis');
    }
}
