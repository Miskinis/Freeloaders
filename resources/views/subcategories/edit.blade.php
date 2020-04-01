@extends('layouts.page')

@section('title', '| Edit Subcategory')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')

    <!--Divider-->
    <hr class="m-2">

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <h1>Edit Subcategory</h1>

                <hr>

                {!! Form::model($subcategory, ['route' => ['subcategories.update', $subcategory->id], 'method' => 'PUT']) !!}
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}

                {{ Form::label('category_id', "Category:", ['class' => 'form-spacing-top']) }}
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

                <div class="col-md-4">
                    <div class="well">
                        <dl class="dl-horizontal">
                            <dt>Created At:</dt>
                            <dd>{{ date('M j, Y H:i:s', strtotime($subcategory->created_at)) }}</dd>
                        </dl>

                        <dl class="dl-horizontal">
                            <dt>Last Updated:</dt>
                            @if(empty($subcategory->updated_at))
                                <dd>Never</dd>
                            @else
                                <dd>{{ date('M j, Y H:i:s', strtotime($subcategory->updated_at)) }}</dd>
                            @endif
                        </dl>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                {!! Html::linkRoute('subcategories.index', 'Cancel', array($subcategory->id), array('class' => 'btn btn-danger btn-block')) !!}
                            </div>
                            <div class="col-sm-6">
                                {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                            </div>
                        </div>

                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
