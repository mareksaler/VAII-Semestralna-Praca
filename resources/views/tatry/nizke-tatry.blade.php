@extends('layouts.layout')

@section('main')
<div class="container-lg bleda mt-3 pt-3 rounded">
    @if (session()->has('message'))
    <div class="row">
        <div class="alert alert-success col-3" role="alert">
            {{ session()->get('message') }}
        </div>
    </div>
    @endif
    <div class="row pb-4">
        <div class="col-12">
            <img class="img-fluid mx-auto d-block rounded" src="img/nizke_tatry/nizke_tatry.jpg" height="560" width="1300" alt="Nizke Tatry panorama" />
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h1 class="zarovanaj-na-sted">Nízke Tatry</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p>
                Nízke Tatry sú pohorie a geomorfologický celok v Západných Karpatoch na Slovensku. V centrálnej časti
                pohoria bol
                vyhlásený národný park - NAPANT. Geomorfologický celok sa člení na dva geomorfologické podcelky:
                Ďumbierske Tatry v
                západnej a Kráľovohoľské Tatry vo východnej časti, ktoré sú oddelené údoliami riečok Boca a Štiavnička.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h4>Vrcholy</h4>
            <hr class="solid">
        </div>
    </div>
    <div class="row">
        <p>
            Hrebeň prekračuje štyrmi vrcholmi nadmorskú výšku 2 000 m:
        </p>
    </div>
    <div class="row">
        <div class="col-md">
            <ul>
                <li>Ďumbier (2 043 m n. m.)</li>
                <li>Štiavnica (2 025 m n. m.)</li>
                <li>Chopok (2 024 m n. m.)</li>
                <li>Dereše (2 004 m n. m.)</li>
                <li>Skalka (1 980 m n. m.)</li>
                <li>Chabenec (1 955 m n. m.)</li>
                <li>Kráľova hoľa (1 948 m n. m.)</li>
                <li>Kotliská (1 940 m n. m.)</li>
                <li>Krúpova hoľa (1 927,5 m n. m.)</li>
                <li>Zákľuky (1 914,5 m n. m.)</li>
                <li>Poľana (1 889,7 m n. m.)</li>
                <li>Bôr (1 887,6 m n. m.)</li>
                <li>Konské (1 882,3 m n. m.)</li>
                <li>Stredná hoľa (1 875,9 m n. m.)</li>
                <li>Baňa (1 859,1 m n. m.)</li>
            </ul>
        </div>
        <div class="col-md">
            <ul>
                <li>Žiarska hoľa (1 840,5 m n. m.)</li>
                <li>Orlová (1 840 m n. m.)</li>
                <li>Besná (1 807,4 m n. m.)</li>
                <li>Bartková (1 790,2 m n. m.)</li>
                <li>Veľký Gápeľ (1 776,5 m n. m.)</li>
                <li>Veľká Chochuľa (1 753 m n. m.)</li>
                <li>Krakova hoľa (1 751,6 m n. m.)</li>
                <li>Ďurková (1 750 m n. m.)</li>
                <li>Ludárova hoľa (1 731,6 m n. m.)</li>
                <li>Veľký bok (1 727 m n. m.)</li>
                <li>Veľká Vápenica (1 691 m n. m.)</li>
                <li>Latiborská hoľa (1 643 m n. m.)</li>
                <li>Poludnica (1 548 m n. m.)</li>
                <li>Andrejcová (1 520 m n. m.)</li>
                <li>Chabenec (1 515,5 m n. m.)</li>
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
