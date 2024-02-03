@extends('dashboard.layouts.master')
@section('title', 'Add Class')
@section('content')
    <div class="row container">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Add Company </h5>
                <form action="{{ route('companies-admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nameAr" class="form-label">Name In Arabic</label>
                            <input type="text" class="form-control" id="nameAr" name="nameAr" />
                        </div>
                        @error('nameAr')
                            <span style="color: red"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nameEng" class="form-label">Name In English</label>
                            <input type="text" class="form-control" id="nameEng" name="nameEng" />
                        </div>

                        @error('nameEng')
                            <span style="color: red"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="mobile" class="form-label">mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" />
                        </div>
                        @error('mobile')
                            <span style="color: red"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="email" class="form-label">email</label>
                            <input type="email" class="form-control" id="email" name="email" />
                        </div>
                        @error('email')
                            <span style="color: red"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="location" class="form-label">location</label>
                            <input type="text" class="form-control" id="location" name="location" />
                        </div>
                        @error('location')
                            <span style="color: red"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="logo" class="form-label">logo</label>
                            <input type="text" class="form-control" id="logo" name="logo" />
                        </div>
                        @error('logo')
                            <span style="color: red"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="type_id" class="form-label">Type-النوع</label>
                            <select class="form-select" id="type_id" aria-label="type_id" name="type_id">
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->nameAr }}-{{ $type->nameEng }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>

                    </div>
                </form>
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
