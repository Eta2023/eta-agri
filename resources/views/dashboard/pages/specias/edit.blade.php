@extends('dashboard.layouts.master')
@section('title', 'Edit Species')
@section('content')


    <div class="row container">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Species </h5>
                <form action="{{ route('species-admin.update', $Species->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nameAr" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $Species->name }}" />
                        </div>

                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="manufacture-company" class="form-label">Manufacture Company</label>
                            <input type="text" class="form-control" id="manufacture-company" name="manufacture_company"
                                value="{{ $Species->manufacture_company }}" />
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="mb-3">
                            <label for="license-number" class="form-label">License Number</label>
                            <input type="text" class="form-control" id="license-number" name="license_number"
                                value="{{ $Species->license_number }}" />
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <img id="showImage" width="100px"
                                src="{{ $Species->image == '' ? url('no-image.jpg') : asset($Species->image) }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="type_id" class="form-label">Type-النوع</label>
                            <select class="form-select" id="type_id" aria-label="type_id" name="type_id">
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}"
                                        {{ $Species->type_id == $type->id ? 'selected' : '' }}>
                                        {{ $type->nameAr }} - {{ $type->nameEng }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            })
        });
    </script>
@endsection
