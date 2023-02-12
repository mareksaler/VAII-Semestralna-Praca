@extends('layouts.layout')


@section('main')
<div class="container-lg bleda mt-3 pt-3 rounded">

    <div class="row">
        @include('includes.flash-message')
    </div>

    <div class="row pb-4">
        <div class="col-12">
            <img class="img-fluid mx-auto d-block rounded" src="{{ asset('img/vysoke_tatry/Vysoké_Tatry_panorama1.jpg') }}" height="560" width="1300" alt="Vysoke Tatry panorama" />
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h1 class="zarovanaj-na-sted">Vysoké Tatry</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p>
                Vysoké Tatry sú najvyššie pohorie na Slovensku a v Poľsku a sú zároveň jediným horstvom
                v týchto
                štátoch s alpským charakterom. Sú geomorfologickou časťou Východných Tatier a majú
                rozlohu 341
                km² (260 km² na Slovensku a 81 km² v Poľsku).
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h4>Vrcholy</h4>
            <hr class="solid" />
        </div>
    </div>
    <div class="row">
        <p>
            Vo Vysokých Tatrách nájdeme 26 vrcholov prevyšujúcich výšku 2 500 metrov. 10 vrcholov s výškou
            nad 2
            000 m.n.m. v slovenských Vysokých Tatrách je turistom prístupných po značených chodníkoch so
            sezónnymi uzávierkami od 1. 11. – 15. 6. Naproti tomu vrcholy Gerlachovský štít, Vysoká, Ganek,
            Bradavica, Prostredný hrot, Ľadový štít, Baranie rohy, Lomnický štít, Kežmarský štít a iné sú
            pre
            turistov dostupné iba v sprievode horského vodcu. Pre horolezca s potrebným preukazom je lezenie
            na
            väčšine územia národného parku povolené na vlastné nebezpečenstvo.
        </p>
        <p>Tatranské vrcholy nad 2 500 m:</p>
    </div>
    <div class="row">
        <div class="col-md">
            <ul>
                <li>Gerlachovský štít (2 655 m n. m.)</li>
                <li>Gerlachovská veža (2 642 m n. m.)</li>
                <li>Lomnický štít (2 634 m n. m.)</li>
                <li>Ľadový štít (2 627 m n. m.)</li>
                <li>Pyšný štít (2 621 m n. m.)</li>
                <li>Zadný Gerlach (2 616 m n. m.)</li>
                <li>Lavínový štít (2 606 m n. m.)</li>
                <li>Malý Ľadový štít (2 603 m n. m.)</li>
                <li>Kotlový štít (2 601 m n. m.)</li>
                <li>Lavínová veža (2 600 m n. m.)</li>
                <li>Malý Pyšný štít (2 590 m n. m.)</li>
                <li>Veľká Litvorová veža (2 581 m n. m.)</li>
                <li>Loktibrada (2 575 m n. m.)</li>
                <li>Strapatá veža (2 565 m n. m.)</li>
                <li>Posledná veža (2 560 m n. m.)</li>
                <li>Kežmarský štít (2 556 m n. m.)</li>
            </ul>
        </div>
        <div class="col-md">
            <ul>
                <li>Vysoká (2 547 m n. m.)</li>
                <li>Malá Litvorová veža (2 547 m n. m.)</li>
                <li>Supia veža (2 540 m n. m.)</li>
                <li>Končistá (2 538 m n. m.)</li>
                <li>Baranie rohy (2 526 m n. m.)</li>
                <li>Čertova veža (2 525 m n. m.)</li>
                <li>Dračí štít (2 523 m n. m.)</li>
                <li>Veľká Vidlová veža (2 523 m n. m.)</li>
                <li>Ťažký štít (2 520 m n. m.)</li>
                <li>Malý dračí štít (2 518 m n. m.)</li>
                <li>Veterný štít (2 515 m n. m.)</li>
                <li>Malý Kežmarský štít (2 514 m n. m.)</li>
                <li>Zadný Ľadový štít (2 512 m n. m.)</li>
                <li>Predný štôlsky hrb (2 510 m n. m.)</li>
                <li>Rysy (2 503 m n. m.)</li>
            </ul>
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
