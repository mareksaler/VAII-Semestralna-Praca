@extends('layouts.layout')

@section('main')
<div class="container-lg bleda mt-3 pt-3 pb-3">
    <div class="row">
        @include('includes.flash-message')
    </div>
    <div class="row">
        <div class="col-12">
            <h1 class="zarovanaj-na-sted">{{ $hike->title }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <img src="{{ asset('img/hikes/' . $hike->imagePath) }}" class="tatry-obrazok img-fluid mx-auto d-block" alt="{{ $hike->title }}">
        </div>
        <div class="col">
            @auth
            <form action="{{ route('finnished-hikes.store', $hike) }}" method="post">
                @method('get')
                @csrf
                <button type="submit" class="btn btn-success">Splnené</button>
            </form>
            @endauth
            <div class="fs-4">Dĺžka túry: {{ $hike->distance }} km</div>
            <div class="fs-4">Čas túry: {{ $hike->time }} hod</div>
        </div>
    </div>

    <div class="row">
        <p class="m-2">
            {{ $hike->text }}
        </p>
    </div>

</div>
@endsection
