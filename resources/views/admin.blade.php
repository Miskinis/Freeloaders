@extends('layouts.page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 text-center">
                                <i class="fas fa-clipboard-list fa-5x"></i>
                                <h5 class="font-weight-bold text-capitalize p-3">Show All Subcategories</h5>
                                <a href="{{route('subcategories.index')}}" class="stretched-link"></a>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 text-center">
                                <i class="fas fa-edit fa-5x"></i>
                                <h5 class="font-weight-bold text-capitalize p-3">Create New Subcategory</h5>
                                <a href="{{route('subcategories.create')}}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
