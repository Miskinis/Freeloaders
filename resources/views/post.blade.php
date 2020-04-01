@extends('layouts.page')

@section('title', config('app.name') .' | '. $post->name)

@section('content')
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
                <h1>{{ $post->title }}</h1>
                <p class="lead">{!! $post->content !!}</p>
            </div>
        </div>
    </div>
@endsection
