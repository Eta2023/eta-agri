@extends('dashboard.layouts.master')
@section('title', 'Add Kingdom')
@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <h5 class="card-header">Add Kingdom </h5>
                <form action="{{ route('kingdom-admin.store') }}" method="POST" enctype="multipart/form-data">
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
