@extends('layouts.layout')

@section('main')
<div class="container-lg bleda mt-3 pt-3 pb-3">
    <div class="d-flex justify-content-center flex-wrap ">
        @include('includes.flash-message')
    </div>
    <div class="row">
        <div class="col-12">
            <h1 class="zarovanaj-na-sted">{{ $hike->title }}</h1>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6">
            <div class="row">
                @auth
                @if (auth()->user()->id === $hike->user_id)
                <div class="col-sm-2">
                    <a role="button" class="btn btn-primary" href="{{ route('hikes.edit', $hike) }}">
                        Upraviť
                    </a>
                </div>
                <div class="col-sm-2">
                    <form method="POST" action="{{ route('hikes.destroy', $hike) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Vymazať</button>
                    </form>
                </div>
                @endif
                {{-- @if (!$finnished) --}}
                <div class="col-sm-2">
                    <form action="{{ route('finnished-hikes.store', $hike) }}" method="post">
                        @method('get')
                        @csrf
                        <button type="submit" class="btn btn-success">Splnené</button>
                    </form>
                </div>
                {{-- @endif --}}
                @endauth
            </div>
            <div class="fs-4">Dĺžka túry: {{ $hike->distance }} km</div>
            <div class="fs-4">Čas túry: {{ $hike->time }} hod</div>
            <p class="m-2">
                {!! $hike->text !!}
            </p>
        </div>

        <div class="col-md-6">
            <img src="{{ asset('img/hikes/' . $hike->imagePath) }}" class="tatry-obrazok img-fluid mx-auto d-block" alt="{{ $hike->title }}">
        </div>
    </div>

</div>
@endsection
