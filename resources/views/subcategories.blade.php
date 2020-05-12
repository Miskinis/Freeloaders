@extends('layouts.page')

@section('title', config('app.name') .' | '. $category->name)

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
@endsection

@section('content')

    <!--Divider-->
    <hr class="m-2">

    <div class="container-fluid">
        <div class="row">
            <nav class="d-none d-lg-block col-lg-2 navbar navbar-light bg-light px-2 border-right">
                <ul class="navbar-nav mx-2">
                    @foreach($category->subcategories as $subcategory)
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{route('subcategories.posts', [$category->id, $subcategory->id])}}">{{ $subcategory->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </nav>
            <div class="col-lg-10 col-md-12">
                <h1 class="font-weight-bold text-capitalize pb-5">{{$category->name}}</h1>
                <div class="row">
                    @forelse($category->subcategories as $subcategory)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-md-3">
                            <div class="card">
                                <img class="card-img-top img-responsive" src="{{asset('images/'. $subcategory->featured_img)}}"
                                     alt="{{$subcategory->title. ' image'}}"/>
                                <div class="card-body border-top">
                                    <h3 class="font-weight-bold text-capitalize ">{{ $subcategory->title }}</h3>
                                    <a href="{{route('subcategories.posts', [$category->id, $subcategory->id])}}"
                                       class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h1 class="font-weight-bold text-capitalize pb-5">{{$category->name}}</h1>
                        <h1>No subcategories found for category: {{$category->name}}</h1>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
