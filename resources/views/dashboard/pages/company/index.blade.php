@extends('dashboard.layouts.master')
@section('title', 'Company')
@section('content')
    <div class="content-wrapper container">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h4>Manage Company</h4>
                    <a href="#" class="mb-1 btn btn-outline-primary" data-toggle="modal" data-target="#addCompanyModal">
                        <i class="mdi mdi-checkbox-marked-outline mr-1"></i>
                        Add Company
                    </a>
                </div>
                @if(session('message'))
                <div class="alert alert-{{ session('alert-type') }}">
                    {{ session('message') }}
                </div>
            @endif
                <div class="card-body table-responsive">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
  @include('dashboard.pages.company.modal.create')
@endsection
