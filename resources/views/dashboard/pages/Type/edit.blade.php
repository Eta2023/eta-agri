@extends('dashboard.layouts.master')
@section('title', 'Edit Types')
@section('content')


    <div class="row container">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Type </h5>
                <form action="{{ route('types-admin.update', $Type->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nameAr" class="form-label">Name In Arabic</label>
                            <input type="text" class="form-control" id="nameAr" name="nameAr" value="{{$Type->nameAr}}" />
                        </div>
                        @error('nameAr')
                        <span style="color: red"> {{ $message }}</span>
                    @enderror

                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nameEng" class="form-label">Name In English</label>
                            <input type="text" class="form-control" id="nameEng" name="nameEng" value="{{$Type->nameEng}}" />
                        </div>
                        @error('nameEng')
                        <span style="color: red"> {{ $message }}</span>
                    @enderror
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="note" class="form-label">Note</label>
                            <input type="text" class="form-control" id="note" name="note" value="{{$Type->note}}" />
                        </div>
                        @error('note')
                        <span style="color: red"> {{ $message }}</span>
                    @enderror
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="genus_id" class="form-label">Genus-الجنس</label>
                            <select class="form-select" id="genus_id" aria-label="genus_id" name="genus_id">
                                @foreach ($genus as $gen)
                                    <option value="{{ $gen->id }}" {{ $Type->genus_id == $gen->id ? 'selected' : '' }}>
                                        {{ $gen->nameAr }} - {{ $gen->nameEng }}
                                    </option>
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
