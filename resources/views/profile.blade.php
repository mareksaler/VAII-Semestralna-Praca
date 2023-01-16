@extends('layouts.layout')

@section('title')
<title>Profil</title>
@endsection

@section('main')
<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                @include('includes.flash-message')
            </div>
            <div class="card">
                <div class="card-header">Splnené túry</div>
                <div class="card-body">

                    <div class="row farba-text p-2">
                        <div class="d-flex justify-content-start flex-wrap ">
                            @foreach ($hikes as $hike)
                            <a href="{{ route('hikes.show', $hike) }}">
                                <div class="card karta m-1">
                                    <img src="{{ asset('img/hikes/'. $hike->imagePath) }}" height="160px" class="card-img-top" alt="...">

                                    <div class="card-body">
                                        <a href="{{ route('hikes.show', $hike) }}" data-bs-toggle="modal" class="karta-nadpis" data-bs-target="">
                                            <h5 class="card-title">
                                                {{ $hike->title }}
                                            </h5>
                                        </a>
                                        @auth
                                        {{-- @if (auth()->user()->id === $hike->user_id) --}}
                                        <div class="row">
                                            <div class="col">
                                                <a role="button" class="btn btn-primary btn-sm" href="">
                                                    Upraviť
                                                </a>
                                            </div>
                                            <div class="col ">
                                                <form method="POST" action="{{ route('finnished-hikes.destroy', $hike) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm">Vymazať</button>
                                                </form>
                                            </div>
                                        </div>
                                        {{-- @endif --}}
                                        @endauth
                                    </div>
                                </div>
                            </a>
                            {{-- @endif --}}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>



</div>
@endsection
