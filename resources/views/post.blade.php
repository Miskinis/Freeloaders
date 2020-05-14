@extends('layouts.page')

@section('title', config('app.name') .' | '. $post->title)

@section('content')

    <!--Divider-->
    <hr class="m-2">

    <div class="container-fluid">
        <div class="row">
            <nav class="d-none d-lg-block col-lg-2 navbar navbar-light bg-light px-2 border-right">
                <ul class="navbar-nav mx-2">
                    @foreach($subcategory->posts as $nav_post)
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{route('posts.post', [$category->id, $subcategory->id, $nav_post->id])}}">
                                {{ $nav_post->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </nav>

            <div class="col-lg-10 col-md-12 my-2">
                <h1>{{ $post->title }}</h1>
                <hr class="m-2">
                <h5>Offer by <p class="font-weight-bold d-inline">{{Freeloaders\User::find($post->user_id)->name}}</p></h5>
                <hr class="m-2">
                <p class="lead">{!! $post->body !!}</p>
            </div>
        </div>
    </div>
@endsection
