@extends('layouts.layout')


@section('main')
<div class="container-lg bleda mt-3 pt-3">

    <div class="row">
        @include('includes.flash-message')
    </div>

    <div class="row">
        <div class="btn-group" role="group">
            @foreach ($categories as $category)
            <a class="category btn btn-primary" href="{{ route('hikes.index', ['category_name' => $category->name]) }}">
                <li class="category">{{ $category->name }}</li>
            </a>
            @endforeach
            <a class="category btn btn-primary" href="{{ route('hikes.index', ['category_name' => 'all']) }}">
                <li class="category">Všetky</li>
            </a>
        </div>
    </div>

    @if (Auth::check())
    <a role="button" class="btn btn-success" href="{{ route('hikes.create') }}">
        Pridať túru
    </a>
    @endif

    @include('tatry.includes.card')


</div>
@endsection
