@extends('dashboard.layouts.master')
@section ('title','agriculture_types')
@section('content')
<div class="content-wrapper container">

    <div class="content">
        <div class="card card-default">
            <div class="card-header">
                <h4>Manage agriculture_types</h4>
                <a href="{{route('AgricultureTypes-admin.create')}}" class="mb-1 btn btn-outline-primary">
                    <i class=" mdi mdi-checkbox-marked-outline mr-1"></i>
                    Add agriculture_types
                </a>
            </div>
            <div class="card-body table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
</div>

@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
@endsection