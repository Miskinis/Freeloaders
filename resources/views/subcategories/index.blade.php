@extends('layouts.page')

@section('title', '| All Subcategories')

@section('content')

    <!--Divider-->
    <hr class="m-2">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1>All Subcategories</h1>
            </div>

            <div class="col-md-2">
                <a href="{{ route('subcategories.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Subcategory</a>
            </div>
            <div class="col-md-12">
                <hr>
            </div>
        </div> <!-- end of .row -->

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Created At</th>
                    <th></th>
                    </thead>

                    <tbody>

                    @foreach ($subcategories as $subcategory)

                        <tr>
                            <th>{{ $subcategory->id }}</th>
                            <td>{{ $subcategory->title }}</td>
                            <td>{{ date('M j, Y', strtotime($subcategory->created_at)) }}</td>
                            <td>
                                <a href="{{ route('subcategories.show', $subcategory->id) }}" class="btn btn-success btn-sm">View</a>
                                <a href="{{ route('subcategories.edit', $subcategory->id) }}" class="btn btn-success btn-sm">Edit</a>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
