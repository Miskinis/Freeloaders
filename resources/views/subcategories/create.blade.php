@extends('layouts.page')

@section('title', '| Create New Post')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
    <!--Divider-->
    <hr class="m-2">

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <h1>Create New Subcategory</h1>

                <hr>

                {!! Form::open(array('route' => 'subcategories.store', 'data-parsley-validate' => '', 'files' => true)) !!}
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

                {{ Form::label('category_id', 'Category:') }}
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">
                            {{$category->name}}
                        </option>
                    @endforeach
                </select>

                <hr>
                {{ Form::label('featured_img', 'Upload a Featured Image') }}
                {{ Form::file('featured_img') }}
                <hr>

                {{ Form::submit('Create Subcategory', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
