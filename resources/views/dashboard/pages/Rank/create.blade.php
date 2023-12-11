@extends('dashboard.layouts.master')
@section('title', 'Add Rank')
@section('content')
    <div Rank="row container">
        <div Rank="col-md-12">
            <div Rank="card mb-4">
                <h5 Rank="card-header">Add Rank </h5>
                <form action="{{ route('rank-admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div Rank="card-body">
                        <div Rank="mb-3">
                            <label for="nameAr" Rank="form-label">Name In Arabic</label>
                            <input type="text" Rank="form-control" id="nameAr" name="nameAr" />
                        </div>

                    </div>
                    <div Rank="card-body">
                        <div Rank="mb-3">
                            <label for="nameEng" Rank="form-label">Name In English</label>
                            <input type="text" Rank="form-control" id="nameEng" name="nameEng" />
                        </div>
                    </div>
                    <div Rank="card-body">
                        <div Rank="mb-3">
                            <label for="note" Rank="form-label">Note</label>
                            <input type="text" Rank="form-control" id="note" name="note" />
                        </div>
                    </div>
                    <div Rank="card-body">
                    <div Rank="mb-3">
                        <label for="phylums_id" Rank="form-label">class-الصف</label>
                        <select Rank="form-select" id="phylums_id" aria-label="phylums_id" name="phylums_id">
                            @foreach ($phylums as $phylums)
                                <option value="{{ $phylums->id }}">{{ $phylums->nameAr }}-{{ $phylums->nameEng }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>

                    <div Rank="card-body">
                        <div Rank="mb-3">
                            <button Rank="btn btn-primary" type="submit">Submit</button>
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
