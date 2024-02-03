@extends('dashboard.layouts.master')
@section('title', 'Add Pesticide')
@section('content')
    <div class="row container">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Add Pesticide </h5>
                <form action="{{ route('pesticides-admin.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal fade text-left" id="addPesticideModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">{{ __('Create New Pesticide') }}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" />
                                            </div>
                                            @error('name')
                                                <span style="color: red"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <input type="text" class="form-control" id="description"
                                                    name="description" />
                                            </div>

                                            @error('description')
                                                <span style="color: red"> {{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="license_number" class="form-label">License_number</label>
                                                <input type="number" class="form-control" id="license_number"
                                                    name="license_number" />
                                            </div>
                                            @error('license_number')
                                                <span style="color: red"> {{ $message }}</span>
                                            @enderror
                                        </div>

                                    

                                        <div class="card-body">
                                            <div class="mb-3">
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
