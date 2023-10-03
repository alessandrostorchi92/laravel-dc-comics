@extends("layouts.public")

@section('comics')

    <div class="container w-50">

        <div>
                <div class="card border-0 mt-5">

                    <div class="img-container ratio ratio-1x1">
                        <img src="{{ $selectedComic->thumb }}" class="card-img-top" alt="Comic-Cover">
                    </div>

                    <div class="card-body bg-dark text-white text-center d-flex flex-column mt-auto">

                        <div class="card-text">

                            <p><strong>Tipo:</strong> {{ $selectedComic->type }}</p>
                            <p>Artists:{{ implode(",",$selectedComic["artists"]) }}</p>
                            <p>Writers:{{ implode(",", $selectedComic["writers"]) }} </p>
                            <p><strong>Data:</strong> {{ $selectedComic->sale_date }}</p>
                            
                        </div>

                    </div>

                </div>

                <div class="mt-5 d-flex justify-content-center gap-3">
                    <button class="btn btn-secondary btn-lg border-0 rounded-50"><a class="text-decoration-none text-light" href={{ route('comics.index') }}>BACK</a></button>
                </div>

        </div>

    </div>

@endsection

