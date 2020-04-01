@extends('layouts.page')

@section('title', 'Freeloaders')

@section('content')

    <div class="container-fluid">
        @component('components.jumbotron')
            @slot('title', config('app.name'))

            @slot('description')
                Lots and lots of description. Very descriptive!
            @endslot
        @endcomponent

        <div class="container">
            <h1 class="font-weight-bold text-capitalize pb-5">Job categories</h1>
            <div class="row">
                @forelse($categories as $category)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 text-center">
                        <i class="{{$category->icon_code}} fa-7x"></i>
                        <h3 class="font-weight-bold text-capitalize p-3">{{ $category->name }}</h3>
                        <a href="{{route('categories.subcategories', [$category->id])}}" class="stretched-link"></a>
                    </div>
                @empty
                    <h1>No categories found in database</h1>
                @endforelse
            </div>
        </div>
    </div>
@endsection
