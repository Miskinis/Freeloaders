@extends('layouts.page')

@section('title', '| View Post')

@section('content')

    <!--Divider-->
    <hr class="m-2">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="well">
                    <dl class="dl-horizontal">
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Subcategory:</label>
                        <p>{{ $post->subcategory->title }}</p>
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Created At:</label>
                        <p>{{ date('M j, Y H:i:s', strtotime($post->created_at)) }}</p>
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Last Updated:</label>
                        @if(empty($post->updated_at))
                            <p>Never</p>
                        @else
                            <p>{{ date('M j, Y H:i:s', strtotime($post->updated_at)) }}</p>
                        @endif
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                            {!! Form::close() !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            {{ Html::linkRoute('posts.index', '<< See All Posts', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-8">
                <h1>{{ $post->title }}</h1>
                <p class="lead">{!! $post->body !!}</p>
            </div>
        </div>
    </div>
@endsection
