@extends('dashboard.layouts.master')
@section('title', 'farmeDashboard')
@section('content')
    {{-- <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('dashboard/assets/img/icons/unicons/chart-success.png') }}"
                                    alt="chart success" class="rounded" />
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Kingdom</span>
                        <h3 class="card-title mb-2">{{ $kingdom->count() }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('dashboard/assets/img/icons/unicons/chart-success.png') }}"
                                    alt="chart success" class="rounded" />
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">phylum</span>
                        <h3 class="card-title mb-2">{{ $phylum->count() }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('dashboard/assets/img/icons/unicons/chart-success.png') }}"
                                    alt="chart success" class="rounded" />
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">class</span>
                        <h3 class="card-title mb-2">{{ $class->count() }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('dashboard/assets/img/icons/unicons/chart-success.png') }}"
                                    alt="chart success" class="rounded" />
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">rank</span>
                        <h3 class="card-title mb-2">{{ $rank->count() }}</h3>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-3 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('dashboard/assets/img/icons/unicons/chart-success.png') }}"
                                    alt="chart success" class="rounded" />
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">genus</span>
                        <h3 class="card-title mb-2">{{ $genus->count() }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('dashboard/assets/img/icons/unicons/chart-success.png') }}"
                                    alt="chart success" class="rounded" />
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">species</span>
                        <h3 class="card-title mb-2">{{ $species->count() }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('dashboard/assets/img/icons/unicons/chart-success.png') }}"
                                    alt="chart success" class="rounded" />
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">types</span>
                        <h3 class="card-title mb-2">{{ $types->count() }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="{{ asset('dashboard/assets/img/icons/unicons/chart-success.png') }}"
                                    alt="chart success" class="rounded" />
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">family</span>
                        <h3 class="card-title mb-2">{{ $family->count() }}</h3>
                    </div>
                </div>
            </div>

        </div>
    </div> --}}
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                        <div class="card">
                            <div class="d-flex align-items-end row">
                                <div class="col-sm-7">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary"> Weather 🌤️</h5>
                                        {{-- <p class="mb-4">
                                            <strong>Temperature:</strong> 25°C
                                        </p>
                                        <p class="mb-4">
                                            <strong>Day:</strong> Monday
                                        </p> --}}
                                        <p class="mb-4">
                                            <strong></strong> January 1, 2023
                                        </p>
                                        <p class="mb-4">
                                                <strong></strong> Monday
                                            </p>
                                        <p class="mb-4">
                                                <strong></strong> 25°C
                                            </p>
                    
                                        <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Calendar</a>
                                    </div>
                                </div>
                                <div class="col-sm-5 text-center text-sm-left">
                                    <div class="card-body pb-0 px-0 px-md-4">
                                        <!-- You can add an icon or illustration related to weather here -->
                                        <!-- Example: -->
                                        <img src="{{ asset('dashboard/assets/img/icons/weather-sun.png') }}"
                                            height="140" alt="Weather Icon" />
                                    </div>
                                </div>
                            </div>
                    
                            <!-- Chart Section -->
                            <div class="card-body">
                                <canvas id="myChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Add this script to initialize the chart -->
                    <script>
                        // Assuming you have data for the chart
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar', // Change the chart type as needed
                            data: {
                                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                                datasets: [{
                                    label: 'Sales',
                                    data: [12, 19, 3, 5, 2, 3, 8],
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                    

            <!-- Add this script to initialize the chart -->
            <script>
                // Assuming you have data for the chart
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar', // Change the chart type as needed
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                        datasets: [{
                            label: 'Sales',
                            data: [12, 19, 3, 5, 2, 3, 8],
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>

            <div class="col-lg-4 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('speciesAndTypesDetailes.speciesAndTypesDetailes') }}">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <img src="{{ asset('dashboard/assets/img/icons/unicons/chart-success.png') }}"
                                                alt="chart success" class="rounded" />
                                        </div>
                                    </div>
                                </a>
                                <span class="fw-semibold d-block mb-1">species and types </span>
                                {{-- <h3 class="card-title mb-2">{{ $species->count() }}</h3> --}}
                                {{-- <select name="species_id" class="form-control">
                                    <option value="" selected disabled>Select Species</option>
                                    @foreach ($species as $specie)
                                        <option class="btn btn-primary" data-toggle="modal" data-target="#myModal"
                                            value="{{ $specie->id }}">{{ $specie->name }}</option>
                                    @endforeach
                                </select> --}}
                            </div>
                            <!-- Button to trigger modal -->

                            <!-- Modal -->
                            {{-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Specie detailes </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Content goes here -->
                                            <p><strong>name : {{ $specie->name }}</strong></p>
                                            <p><strong>Image: <img class="card-img card-img-left" style="width:200px"
                                                        src="{{ asset($specie->image) }}" alt="Card image"></strong></p>


                                        </div>
                                    
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">

                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('speciesAndTypesDetailes.speciesAndTypesDetailes') }}">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <img src="{{ asset('dashboard/assets/img/icons/unicons/chart-success.png') }}"
                                                alt="chart success" class="rounded" />
                                        </div>
                                    </div>
                                </a>
                                <span class="fw-semibold d-block mb-1"> pesticides and fertilizers</span>
                                {{-- <h3 class="card-title mb-2">{{ $species->count() }}</h3> --}}

                            </div>





                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('addFarmDetailes') }}">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <img src="{{ asset('dashboard/assets/img/icons/unicons/chart-success.png') }}"
                                                alt="chart success" class="rounded" />
                                        </div>
                                    </div>
                                </a>
                                <span class="fw-semibold d-block mb-1">Add farm</span>
                                {{-- <h3 class="card-title mb-2">{{ $species->count() }}</h3> --}}

                            </div>
                            <!-- Button to trigger modal -->

                            <!-- Modal -->
                            {{-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Specie detailes </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Content goes here -->
                                                <p><strong>name : {{ $specie->name }}</strong></p>
                                                <p><strong>Image: <img class="card-img card-img-left" style="width:200px"
                                                            src="{{ asset($specie->image) }}" alt="Card image"></strong></p>
    
    
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div> --}}

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">

                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('manageFarmDetailes') }}">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <img src="{{ asset('dashboard/assets/img/icons/unicons/chart-success.png') }}"
                                                alt="chart success" class="rounded" />
                                        </div>
                                    </div>
                                </a>
                                <span class="fw-semibold d-block mb-1">Manage farm </span>
                                {{-- <h3 class="card-title mb-2">{{ $species->count() }}</h3> --}}

                            </div>





                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- Total Revenue -->

        <!--/ Total Revenue -->
        {{-- <div class="col-lg-4 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ asset('dashboard/assets/img/icons/unicons/chart-success.png') }}"
                                            alt="chart success" class="rounded" />
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">agriculture</span>
                                <span class="fw-semibold d-block mb-1">types</span>

                                <h3 class="card-title mb-2">{{ $agriculture_types->count() }}</h3>
                                <select name="species_id" class="form-control">
                                    <option value="" selected disabled>Select agriculture_types</option>
                                    @foreach ($agriculture_types as $agriculture_type)
                                        <option value="{{ $agriculture_type->id }}">
                                            {{ $agriculture_type->nameEng }}-{{ $agriculture_type->nameAr }}</option>
                                    @endforeach
                                </select>
                            </div>





                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ asset('dashboard/assets/img/icons/unicons/chart-success.png') }}"
                                            alt="chart success" class="rounded" />
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">irrigation</span>
                                <span class="fw-semibold d-block mb-1">types</span>

                                <h3 class="card-title mb-2">{{ $irrigation_types->count() }}</h3>
                                <select name="species_id" class="form-control">
                                    <option value="" selected disabled>Select irrigation_types</option>
                                    @foreach ($irrigation_types as $irrigation_type)
                                        <option value="{{ $irrigation_type->id }}">
                                            {{ $irrigation_type->name_english }}-{{ $irrigation_type->name_arabic }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>





                        </div>
                    </div>
                </div>
            </div> --}}




    @endsection
