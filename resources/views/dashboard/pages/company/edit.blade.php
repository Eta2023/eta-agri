@extends('dashboard.layouts.master')
@section('title', 'Edit Company')
@section('content')


    <div class="row container">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Company </h5>
                <form action="{{ route('companies-admin.update', $company->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nameAr" class="form-label">Name In Arabic</label>
                            <input type="text" class="form-control" id="nameAr" name="nameAr" value="{{$company->nameAr}}" />
                        </div>
                        
                        @error('nameAr')
                        <span style="color: red"> {{ $message }}</span>
                    @enderror
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nameEng" class="form-label">Name In English</label>
                            <input type="text" class="form-control" id="nameEng" name="nameEng" value="{{$company->nameEng}}" />
                        </div>
                        @error('nameEng')
                        <span style="color: red"> {{ $message }}</span>
                    @enderror
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="number" class="form-control" id="mobile" name="mobile" value="{{$company->mobile}}" />
                        </div>
                        @error('note')
                        <span style="color: red"> {{ $message }}</span>
                    @enderror
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="number" class="form-control" id="mobile" name="mobile" value="{{$company->mobile}}" />
                        </div>
                        @error('note')
                        <span style="color: red"> {{ $message }}</span>
                    @enderror
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="mobile" name="email" value="{{$company->email}}" />
                        </div>
                        @error('note')
                        <span style="color: red"> {{ $message }}</span>
                    @enderror
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="Location" name="Location" value="{{$company->location}}" />
                        </div>
                        @error('note')
                        <span style="color: red"> {{ $message }}</span>
                    @enderror
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="text" class="form-control" id="logo" name="logo" value="{{$company->logo}}" />
                        </div>
                        @error('note')
                        <span style="color: red"> {{ $message }}</span>
                    @enderror
                    </div>
                    
                    <div class="card-body">
                        <div class="mb-3">
                    <button class="btn btn-primary" type="submit" >Submit</button>
                        </div></div>
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
