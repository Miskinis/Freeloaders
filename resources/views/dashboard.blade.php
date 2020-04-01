@extends('layouts.page')

@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
    <style>
        .ck-editor__editable_inline {
            min-height: 25vh !important;
        }
    </style>
@endsection

@section('content')

    <!--Divider-->
    <hr class="m-2">

    <div class="container">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="container row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 text-center">
                        <i class="fas fa-clipboard-list fa-5x"></i>
                        <h5 class="font-weight-bold text-capitalize p-3">Show My Posts</h5>
                        <a href="{{route('posts.index')}}" class="stretched-link"></a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 text-center">
                        <i class="fas fa-edit fa-5x"></i>
                        <h5 class="font-weight-bold text-capitalize p-3">Create New Post</h5>
                        <a href="{{route('posts.create')}}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
