@extends('dashboard.layouts.master')
@section('title', 'Edit Pesticide')
@section('content')


    <div class="row container">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Pesticide </h5>
                <form action="{{ route('pesticides-admin.update', $pesticide->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$pesticide->name}}" />
                        </div>
                        
                        @error('name')
                        <span style="color: red"> {{ $message }}</span>
                    @enderror
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="description" class="form-label">description</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{$pesticide->description}}" />
                        </div>
                        
                    </div>
                    @error('description')
                    <span style="color: red"> {{ $message }}</span>
                @enderror
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="license_number" class="form-label">license_number</label>
                            <input type="number" class="form-control" id="license_number" name="license_number" value="{{$pesticide->license_number}}" />
                        </div>
                        @error('license_number')
                        <span style="color: red"> {{ $message }}</span>
                    @enderror
                    </div>
                    {{-- <div class="card-body">
                        <div class="mb-3">
                            <label for="rank" class="form-label">kingdom-المملكة</label>
                            <select class="form-select" id="rank" aria-label="rank" name="ranks_id">
                                @foreach ($ranks as $rank)
                                    <option value="{{ $rank->id }}" {{ $Pesticide->ranks_id == $rank->id ? 'selected' : '' }}>
                                        {{ $rank->nameAr }} - {{ $rank->nameEng }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    
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
