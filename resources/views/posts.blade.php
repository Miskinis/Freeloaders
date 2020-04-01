@extends('layouts.page')

@section('title', config('app.name') .' | '. $subcategory->title)

@section('content')

    <!--Divider-->
    <hr class="m-2">

    <div class="container-fluid">
        <div class="row">
            <nav class="d-none d-lg-block col-lg-2 navbar navbar-light bg-light px-2 border-right">
                <ul class="navbar-nav mr-auto">
                    @foreach($category->subcategories as $nav_subcategory)
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{route('subcategories.posts', [$category->id, $nav_subcategory->id])}}">{{ $nav_subcategory->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </nav>
            <div class="col-lg-10 col-md-12 my-2">
                <h1 class="font-weight-bold text-capitalize pb-5">{{$subcategory->title}}</h1>
                <div class="row">
                    @forelse($subcategory->posts as $post)
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="card">
                                <img class="card-img-top img-responsive" src="{{asset('images/'. $post->featured_img)}}"
                                     alt="{{$post->title. ' image'}}"/>
                                <div class="card-body border-top">
                                    <h5 class="text-capitalize ">{{ $post->title }}</h5>
                                    <a href="{{route('posts.post', [$category->id, $subcategory->id, $post->id])}}"
                                       class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h1>No subcategories found for this category</h1>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
