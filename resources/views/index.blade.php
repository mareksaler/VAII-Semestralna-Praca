@extends('layouts.layout')

@section('main')
<!-- OBSAH -->
<div class="container">
    <!-- SLIDE GALERIA -->
    <div class="row">
        <div class="col-12">
            <!-- Carousel -->
            <div id="demo" class="carousel slide" data-bs-ride="carousel">
                <!-- Indicators/dots -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
                </div>

                <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/slavkovsky_stit.png') }}" alt="Slavkovsky Stit" class="d-block w-100" />
                        <div class="carousel-caption">
                            <h3>Slavkovský štít</h3>
                            <p>2 452 m n. m.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/koprovsky_stit.png') }}" alt="Koprovsky Stit" class="d-block w-100" />
                        <div class="carousel-caption">
                            <h3>Kôprovský štít</h3>
                            <p>2 363 m n. m.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/jahnaci_stit.png') }}" alt="Jahnaci Stit" class="d-block w-100" />
                        <div class="carousel-caption">
                            <h3>Jahňací štít</h3>
                            <p>2 230 m n. m.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/krivan.png') }}" alt="Kriváň" class="d-block w-100" />
                        <div class="carousel-caption">
                            <h3>Kriváň</h3>
                            <p>2 495 m n. m.</p>
                        </div>
                    </div>
                </div>

                <!-- Left and right controls/icons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </div>

    <!-- TLACIDLA -->
    <div class="row mt-4">
        <div class="col-lg-4 uvod-tlacidla">
            <a href=""><img class="centrovanie" src="{{ asset('img/vysoke_tatry.png') }}" height="250" width="300" alt="Vysoke Tatry" />
                <div class="nadpis">
                    <h1>Vysoké Tatry</h1>
                </div>
            </a>
        </div>
        <div class="col-lg-4 uvod-tlacidla">
            <a href=""><img class="centrovanie" src="{{ asset('img/zapadne_tatry.png') }}" height="250" width="300" alt="Zapadne Tatry" />
                <div class="nadpis">
                    <h1>Západné Tatry</h1>
                </div>
            </a>
        </div>
        <div class="col-lg-4 uvod-tlacidla">
            <a href=""><img class="centrovanie" src="{{ asset('img/nizke_tatry.jpg') }}" height="250" width="300" alt="Nizke Tatry" />
                <div class="nadpis">
                    <h1>Nízke Tatry</h1>
                </div>
            </a>
        </div>
    </div>

    <!-- CITATY -->
    <div class="row citat">
        <p>„Len ľudia sú schopní skaziť mi náladu, príroda nikdy.“</p>
        <h6>Fridrich August</h6>
    </div>
    <div class="row citat vpravo">
        <p>„Hory volajú, musím ísť.“</p>
        <h6>John Muir</h6>
    </div>
</div>
@endsection
