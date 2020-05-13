@extends('layouts.page')

@section('title', '| Edit Offer Post')

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
            <div class="col-md-12 col-md-offset-2 p-2">
                <h1>Edit Post</h1>

                <hr>

                {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}

                {{ Form::label('subcategory_id', "Subcategory:", ['class' => 'form-spacing-top']) }}
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
                {{ Form::label('body', "Content:", ['class' => 'form-spacing-top']) }}
                {{ Form::textarea('body', null, ['class' => 'form-control']) }}
                <hr>

                <div class="col-md-4">
                    <div class="well">
                        <dl class="dl-horizontal">
                            <dt>Created At:</dt>
                            <dd>{{ date('M j, Y H:i:s', strtotime($post->created_at)) }}</dd>
                        </dl>

                        <dl class="dl-horizontal">
                            <dt>Last Updated:</dt>
                            @if(empty($post->updated_at))
                                <dd>Never</dd>
                            @else
                                <dd>{{ date('M j, Y H:i:s', strtotime($post->updated_at)) }}</dd>
                            @endif
                        </dl>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                {!! Html::linkRoute('posts.index', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
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
