@extends('dashboard.layouts.master')
@section('title', 'Edit irrigation_types')
@section('content')

    <div class="row container">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit irrigation_types </h5>
                <form action="{{ route('IrrigationTypes-admin.update', $irrigation_types->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name_arabic" class="form-label">Name In Arabic</label>
                            <input type="text" class="form-control" id="name_arabic" name="name_arabic" value="{{ $irrigation_types->name_arabic }}" />
                        </div>
                        
                        @error('name_arabic')
                        <span style="color: red"> {{ $message }}</span>
                    @enderror
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name_english" class="form-label">Name In English</label>
                            <input type="text" class="form-control" id="name_english" name="name_english" value="{{ $irrigation_types->name_english }}" />
                        </div>
                        
                    </div>
                    @error('name_english')
                    <span style="color: red"> {{ $message }}</span>
                @enderror
                 
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="agriculture_type_id" class="form-label">agriculture_type-نوع الزراعة</label>
                            <select class="form-select" id="agriculture_type_id" aria-label="agriculture_type_id" name="agriculture_type_id">
                                @foreach ($agriculture_types as $agriculture_type)
                                    <option value="{{ $agriculture_type->id }}" {{ $irrigation_types->agriculture_type_id == $agriculture_type->id ? 'selected' : '' }}>
                                        {{ $agriculture_type->nameAr }} - {{ $agriculture_type->nameEng }}
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
