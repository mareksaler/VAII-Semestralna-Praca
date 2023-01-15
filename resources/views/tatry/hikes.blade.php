@extends('layouts.layout')


@section('main')
<div class="container-lg bleda mt-3 pt-3">

    <div class="row">
        @include('includes.flash-message')
    </div>

    <div class="row">
        <ul class="btn-group" role="group">
            @foreach ($categories as $category)
            <li class="category btn btn-primary"><a class="category" href="{{ route('hikes.index', ['category_name' => $category->name]) }}">{{ $category->name }}</a></li>
            @endforeach
            <li class="category btn btn-primary"><a class="category" href="{{ route('hikes.index', ['category_name' => 'all']) }}">Všetky</a></li>
        </ul>
    </div>

    @if (Auth::check())
    <a role="button" class="btn btn-success" href="{{ route('hikes.create') }}">
        Pridať túru
    </a>
    @endif

    @include('tatry.includes.card')


</div>
@endsection
