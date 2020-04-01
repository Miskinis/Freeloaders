@extends('layouts.page')

@section('title', '| Create New Post')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link code',
            menubar: false
        });
    </script>

@endsection

@section('content')
    <!--Divider-->
    <hr class="m-2">

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <h1>Create New Post</h1>

                <hr>

                {!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true)) !!}
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

                {{ Form::label('subcategory_id', 'Subcategory:') }}
                <select class="form-control" name="subcategory_id">
                    @foreach($categories as $category)
                        <optgroup label="{{$category->name}}">
                            @foreach($category->subcategories as $subcategory)
                                <option value="{{$subcategory->id}}">
                                    {{$subcategory->title}}
                                </option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>

                <hr>
                {{ Form::label('featured_img', 'Upload a Featured Image') }}
                {{ Form::file('featured_img') }}
                <hr>
                {{ Form::label('content', "Post Content:") }}
                {{ Form::textarea('content', null, array('class' => 'form-control')) }}

                {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
