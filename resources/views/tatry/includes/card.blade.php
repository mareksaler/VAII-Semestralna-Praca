<div class="row farba-text p-2">
    <div class="d-flex justify-content-center flex-wrap">
        @foreach ($hikes as $hike)



        <a href="{{ route('hikes.show', $hike) }}">
            <div class="card karta m-1 bg-dark">

                <img src="{{ asset('img/hikes/'. $hike->imagePath) }}" height="160px" class="card-img-top" alt="...">

                <div class="card-body">
                    <a href="{{ route('hikes.show', $hike) }}" class="karta-nadpis text-decoration-none" data-bs-target="">
                        <h5 class="card-title biela">
                            {{ $hike->title }}
                        </h5>
                    </a>
                    @auth
                    @if (auth()->user()->id === $hike->user_id)
                    <div class="row">
                        <div class="col">
                            <a role="button" class="btn btn-primary btn-sm" href="{{ route('hikes.edit', $hike) }}">
                                Upraviť
                            </a>
                        </div>
                        <div class="col ">
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Vymazať
                            </button>
                        </div>
                    </div>
                    @endif
                    @endauth
                </div>
            </div>
        </a>
        {{-- @endif --}}
        @endforeach
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Naozaj?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Naozej chcete vymazať túru: <b>{{ $hike->title }}</b>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zrušiť</button>
                        {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
                        <form method="POST" action="{{ route('hikes.destroy', $hike) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Vymazať</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
