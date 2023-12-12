@extends('dashboard.layouts.master')
@section ('title','Genus')
@section('content')
<div class="content-wrapper container">

    <div class="content">
        <div class="card card-default">
            <div class="card-header">
                <h4>Manage Genus</h4>
                <a href="{{route('genus-admin.create')}}" class="mb-1 btn btn-outline-primary">
                    <i class=" mdi mdi-checkbox-marked-outline mr-1"></i>
                    Add Genus
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