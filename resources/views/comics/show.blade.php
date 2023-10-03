@extends("layouts.public")

@section('comics')

    <div class="container w-50">

        <div>
                <div class="card border-0 mt-5">

                    <div class="img-container ratio ratio-1x1">
                        <img src="{{ $comic->thumb }}" class="card-img-top" alt="Comic-Cover">
                    </div>

                    <div class="card-body bg-dark text-white text-center d-flex flex-column mt-auto">

                        <div class="card-text">

                            <p><strong>Tipo:</strong> {{ $comic->type }}</p>
                            <p>Artists:{{ implode(",",$comic["artists"]) }}</p>
                            <p>Writers:{{ implode(",", $comic["writers"]) }} </p>
                            <p><p><strong>Data:</strong> {{ $comic->sale_date }}</p></p>
                            
                        </div>

                    </div>

                </div>
        </div>

    </div>

@endsection

