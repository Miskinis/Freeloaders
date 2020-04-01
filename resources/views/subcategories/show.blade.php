@extends('layouts.page')

@section('title', '| View Subcategory')

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
                        <label>Category:</label>
                        <p>{{ $subcategory->category->name }}</p>
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Created At:</label>
                        <p>{{ date('M j, Y H:i:s', strtotime($subcategory->created_at)) }}</p>
                    </dl>

                    <dl class="dl-horizontal">
                        <label>Last Updated:</label>
                        @if(empty($subcategory->updated_at))
                            <p>Never</p>
                        @else
                            <p>{{ date('M j, Y H:i:s', strtotime($subcategory->updated_at)) }}</p>
                        @endif

                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Html::linkRoute('subcategories.edit', 'Edit', array($subcategory->id), array('class' => 'btn btn-primary btn-block')) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::open(['route' => ['subcategories.destroy', $subcategory->id], 'method' => 'DELETE']) !!}

                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                            {!! Form::close() !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            {{ Html::linkRoute('subcategories.index', '<< See All Subcategories', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-8">
                <div class="container">
                    <div class="card">
                        <img class="card-img-top img-responsive" src="{{asset('images/'. $subcategory->featured_img)}}" style="height: auto"
                             alt="{{$subcategory->title. ' image'}}"/>
                        <div class="card-body border-top">
                            <h3 class="font-weight-bold text-capitalize ">{{ $subcategory->title }}</h3>
                            <a href="#"
                               class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
