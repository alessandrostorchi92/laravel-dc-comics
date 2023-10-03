{{-- indico quale layout voglio usare su questa pagina --}}
@extends('layouts.public')

@section('comics')
    <div class="text-center">
        <h1 class="mt-5 text-bg-primary d-inline-block display-1">CURRENT SERIES</h1>
    </div>

    <div class="container py-5">

        <div class="row row-cols-sm-1 row-cols-md-3 row-cols-lg-4 g-4">

            @foreach ($Comics as $Comic)
                <div class="col">

                    <div class="card h-100 border-0 rounded-0">

                        <a class="text-decoration-none" href="{{ route('comics.show', $Comic->id) }}">

                            <div>
                                <img src="{{ $Comic['thumb'] }}" class="card-img-top" alt="Comic-Cover">
                            </div>

                            <div class="card-body bg-dark text-white text-center d-flex flex-column">

                                <h5 class="card-title">{{ $Comic['title'] }}</h5>

                                <div class="card-text">

                                    <p>{{ $Comic['price'] }}€</p>
                                    <p>{{ $Comic['shortly_description'] }}</p>
                                    <p>{{ $Comic['series'] }}</p>

                                </div>

                            </div>

                        </a>

                    </div>

                </div>
            @endforeach

        </div>

        <div class="mt-5 d-flex justify-content-center gap-3">

            <button class="btn btn-primary btn-lg border-0 rounded-50">
                <a class="text-decoration-none text-light" href="{{ route('comics.create') }}" class="btn btn-link">ADD</a>
            </button>

        </div>

    </div>
@endsection
