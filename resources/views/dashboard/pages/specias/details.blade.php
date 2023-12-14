@extends('dashboard.layouts.master')
@section('title', 'Detail Species')
@section('content')


    <div class="row container" style="margin-top: 30px">
        <div class="col-md-6 ">
            <div class="card mb-4">
                <h5 class="card-header">Detail Species </h5>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <img class="card-img card-img-left" style="width:200px" src="{{ asset($species->image) }}"
                                alt="Card image">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title">{{ $species->name }}</h5>
                                <p class="card-text">
                                    Manufacture Company: {{ $species->manufacture_company }}
                                    <br>
                                    License Number: {{ $species->license_number }}
                                </p>
                                <p class="card-text"><small class="text-muted">Last updated
                                        {{ $species->updated_at->format('Y-m-d H:i') }} </small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4 mb-xl-0">
            <small class=" fw-medium">Hierarchical Classification</small>
            <div class="demo-inline-spacing mt-3">
                <ol class="list-group list-group-numbered">
                    <li class="list-group-item">Kingdom<i class="bx bx-right-arrow-alt me-2"></i>
                        {{ $species->types->Genuses->families->rank->classetas->phylums->kingdom->nameAr }}-
                        {{ $species->types->Genuses->families->rank->classetas->phylums->kingdom->nameEng }}</li>
                    <li class="list-group-item">Phylum<i class="bx bx-right-arrow-alt me-2"></i>
                        {{ $species->types->Genuses->families->rank->classetas->phylums->nameAr }}-
                        {{ $species->types->Genuses->families->rank->classetas->phylums->nameEng }}</li>
                    <li class="list-group-item">Class <i class="bx bx-right-arrow-alt me-2"></i>
                        {{ $species->types->Genuses->families->rank->classetas->nameAr }}-
                        {{ $species->types->Genuses->families->rank->classetas->nameEng }}</li>
                    <li class="list-group-item">Rank <i class="bx bx-right-arrow-alt me-2"></i>
                        {{ $species->types->Genuses->families->rank->nameAr }}-
                        {{ $species->types->Genuses->families->rank->nameEng }}</li>
                    <li class="list-group-item">Family <i class="bx bx-right-arrow-alt me-2"></i>
                        {{ $species->types->Genuses->families->nameAr }}-
                        {{ $species->types->Genuses->families->nameEng }}</li>
                    <li class="list-group-item">Genus <i class="bx bx-right-arrow-alt me-2"></i>
                        {{ $species->types->Genuses->nameAr }}- {{ $species->types->Genuses->nameEng }}</li>
                    {{-- <li class="list-group-item">Type <i class="bx bx-right-arrow-alt me-2"></i>  {{$species->types->nameAr}}- {{$species->types->nameEng}}</li> --}}
                </ol>
            </div>
        </div>
    </div>
@endsection
