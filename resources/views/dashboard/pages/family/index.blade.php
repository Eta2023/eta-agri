@extends('dashboard.layouts.master')
@section('title', 'Family')
@section('content')
    <div class="content-wrapper container">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h4>Manage Family</h4>
                    <a href="{{ route('family-admin.create') }}" class="mb-1 btn btn-outline-primary">
                        <i class=" mdi mdi-checkbox-marked-outline mr-1"></i>
                        Add Family
                    </a>
                </div>
                @if (session('message'))
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
@endsection
