@extends('dashboard.layouts.master')
@section('title', 'Add connection')
@section('content')
   

    <div class="row container">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Add connection </h5>
                <form action="{{ route('storeConnection') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="pesticide_id" class="form-label">Pestiside Name</label>
                         <p>{{ $pesticide->name }}</p>
                            <input type="text" class="form-control" id="pesticide_id" name="pesticide_id" value="{{ $pesticide->id }}"  hidden />
                        </div>
                        @error('nameAr')
                        <span style="color: red"> {{ $message }}</span>
                    @enderror
                    </div>
                   
                
                <div class="card-body">
                    <div class="mb-3">
                        <label for="type_id" class="form-label">Types in Kingdom {{ $kingdom->nameAr }}</label>
                        <select class="form-select" id="type_id" aria-label="type_id" name="type_id">
                            @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->nameAr }}</option>
                        @endforeach
                        </select>
                    </div>
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
