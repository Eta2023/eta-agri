@extends('dashboard.layouts.master')
@section('title', 'Add Types')
@section('content')
   

    <div class="row container">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Add Types </h5>
                <form action="{{ route('types-admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nameAr" class="form-label">Name In Arabic</label>
                            <input type="text" class="form-control" id="nameAr" name="nameAr" />
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nameEng" class="form-label">Name In English</label>
                            <input type="text" class="form-control" id="nameEng" name="nameEng" />
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="note" class="form-label">Note</label>
                            <input type="text" class="form-control" id="note" name="note" />
                        </div>
                    </div>
                
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="family_id" class="form-label">Family-العائلة</label>
                            <select class="form-select" id="family_id" aria-label="family_id" name="family_id">
                                @foreach ($families as $family)
                                    <option value="{{ $family->id }}">{{ $family->nameAr }}-{{ $family->nameEng }}</option>
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
