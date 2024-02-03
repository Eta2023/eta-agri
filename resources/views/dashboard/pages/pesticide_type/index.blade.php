@extends('dashboard.layouts.master')
@section('title', 'pesticide_type')
@section('content')
    <div class="content-wrapper container">
        <div class="content">
            <div class="card card-default">
        
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
@endsection
