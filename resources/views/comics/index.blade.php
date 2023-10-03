{{-- indico quale layout voglio usare su questa pagina --}}
@extends('layouts.public')

@section('comics')
    <div class="container text-center">

        <h1 class="mt-5 text-bg-primary d-inline-block display-1">CURRENT SERIES</h1>

        <div class="row row-cols-sm-1 row-cols-md-3 g-4">

            @foreach ($Comics as $Comic)
                <div class="card h-100 border-0 mt-5">

                    <div class="img-container">
                        <a href="{{ route('comics.show', $Comic->id) }}"><img src="{{$Comic['thumb']}}" class="card-img-top ratio ratio-1x1" alt="Comic-Cover"></a>
                    </div>

                    <div class="card-body bg-dark text-white text-center d-flex flex-column mt-auto">

                        <h5 class="card-title fs-6">{{ $Comic['title'] }}</h5>

                        <div class="card-text">

                            <p>{{ $Comic['price'] }}€</p>
                            <p class="fst-italic">{{ $Comic['shortly_description'] }}</p>
                            <p>{{ $Comic['series'] }}</p>

                        </div>

                    </div>

                </div>
            @endforeach



        </div>

    </div>
    
@endsection
