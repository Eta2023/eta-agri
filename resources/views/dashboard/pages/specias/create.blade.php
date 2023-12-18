@extends('dashboard.layouts.master')
@section('title', 'Add Species')
@section('content')


    <div class="row container">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Add Species </h5>
                <form action="{{ route('species-admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nameAr" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" />
                        </div>

                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="manufacture-company" class="form-label">Manufacture Company</label>
                            <input type="text" class="form-control" id="manufacture-company"
                                name="manufacture_company" />
                        </div>
                        @error('manufacture_company')
                            <span style="color: red"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="card-body">

                        <div class="mb-3">
                            <label for="license-number" class="form-label">License Number</label>
                            <input type="text" class="form-control" id="license-number" name="license_number" />
                        </div>
                        @error('license_number')
                            <span style="color: red"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <img id="showImage" width="100px" src="{{ url('no-image.jpg') }}">
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>
                        @error('image')
                            <span style="color: red"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="type_id" class="form-label">Type-النوع</label>
                            <select class="form-select" id="type_id" aria-label="type_id" name="type_id">
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">
                                        {{ $type->nameAr }} - {{ $type->nameEng }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if (Route::has('login'))
                        @auth
                            @if (auth()->user()->role == 'admin')
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="verification" class="form-label">Verification-تحقق</label>
                                        <select class="form-select" id="verification" aria-label="verification"
                                            name="verification">

                                            <option value="verified">
                                                Verified
                                            </option>
                                            <option value="unverified">
                                                Unverified
                                            </option>

                                        </select>
                                    </div>
                                </div>
                                @endif @endauth @endif
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
