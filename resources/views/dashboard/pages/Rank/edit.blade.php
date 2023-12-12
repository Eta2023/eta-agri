@extends('dashboard.layouts.master')
@section('title', 'Edit Rank')
@section('content')


    <div class="row container">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Rank </h5>
                <form action="{{ route('rank-admin.update', $Rank->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nameAr" class="form-label">Name In Arabic</label>
                            <input type="text" class="form-control" id="nameAr" name="nameAr" value="{{$Rank->nameAr}}" />
                        </div>
                        

                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nameEng" class="form-label">Name In English</label>
                            <input type="text" class="form-control" id="nameEng" name="nameEng" value="{{$Rank->nameEng}}" />
                        </div>
                        
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="note" class="form-label">Note</label>
                            <input type="text" class="form-control" id="note" name="note" value="{{$Rank->note}}" />
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="class_id" class="form-label">class-الصف</label>
                            <select class="form-select" id="class_id" aria-label="class_id" name="class_id">
                                @foreach ($classetas as $class)
                                    <option value="{{ $class->id }}" {{ $Rank->class_id == $class->id ? 'selected' : '' }}>
                                        {{ $class->nameAr }} - {{ $class->nameEng }}
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
