@extends('layouts.public')

@section("title", "Modifica ". $selectedComic->title)

@section('comics')

    <div class="container mt-5">

        {{-- Nell'attributo "action" inserisco la rotta "comics.store" per leggere i dati e salvarli nel database e nel "method" aggiungo post   --}}

        {{-- Devo inserire infine @csrf() altrimenti verrei bloccato in fase di salvataggio dei dati  --}}

        <h1 class="mb-4 fw-bold text-center">Inserisci i dati del nuovo Comic</h1>

        <form action="{{ route('comics.update', $selectedComic->id) }}" method="POST">
            @csrf
            {{-- Devo specificare il method perchè il form permette solo il POST e non di modificarlo in GET --}}
            @method('put')

            <div class=" container mt-5">

                <div class="mb-4">

                    {{-- Qundo lavoro con i form è essenziali aggiungere l'attributo name per salvare i dati inseriti nel database  --}}

                    <label class="form-label fw-bold">Titolo</label><input type="text"
                        class="form-control @error('title') is-invalid @enderror"
                        placeholder="Inserisci il titolo del fumetto" name="title" value="{{ old('title', $selectedComic->title) }}">

                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

                <div class="mb-4">

                    <label class="form-label fw-bold">Descrizione</label>
                    <textarea class="form-control @error('description') is-invalid @enderror"
                        placeholder="Inserisci la descrizione del fumetto" name="description" value="{{old('description', $selectedComic->description)}}"></textarea>

                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

                <div class="mb-4 fw-bold">

                    <label class="form-label">Immagine</label><input type="text"
                        class="form-control @error('thumb') is-invalid @enderror"
                        placeholder="Inserisci l'immagine del fumetto" name="thumb" value="{{old("thumb", $selectedComic->thumb)}}">

                    @error('thumb')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

                <div class="mb-4 fw-bold">

                    <label class="form-label">Prezzo</label><input step="0.01" type="number"
                        class="form-control @error('price') is-invalid @enderror"
                        placeholder="Inserisci il prezzo del fumetto" name="price" value="{{old("price", $selectedComic->price)}}">

                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

                <div class="mb-4 fw-bold">

                    <label class="form-label">Serie</label><input type="text" class="form-control"
                        placeholder="Inserisci la serie del fumetto" name="series" value="{{old("series", $selectedComic->series)}}">

                </div>

                <div class="mb-4 fw-bold">

                    <label class="form-label">Data</label><input type="date" class="form-control" name="sale_date" value="{{old("sale_date", $selectedComic->sale_date)}}">

                </div>

                <div class="mb-4 fw-bold">

                    <label class="form-label">Tipologia</label><select
                        class="form-select @error('type') is-invalid @enderror" name="type">

                        {{-- L'attributo hidden nel select permette di rendere visibile e inattiva un'option allo scopo di fornire una consegna all'utente --}}

                        {{-- L'attributo selected assieme all'if ternario permette di salvare la selected selezionata  --}}

                        <option hidden>Seleziona la tipologia</option>
                        <option value="Comic Book" {{ old("type", $selectedComic->type) == 'Comic Book' ? 'selected' : ''}}>Comic Book</option>
                        <option value="Graphic Novel" {{ old("type", $selectedComic->type) == 'Graphic Novel' ? 'selected' : ''}}>Graphic Novel</option>

                        @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </select>

                </div>

                <div class="mb-4 fw-bold">

                    <label class="form-label">Artisti</label><input type="text" class="form-control"
                        placeholder="Inserisci gli artisti del fumetto" name="artists" value="{{old("artists", $selectedComic->artists)}}">

                </div>

                <div class="mb-4 fw-bold">

                    <label class="form-label">Sceneggiatori</label><input type="text" class="form-control"
                        placeholder="Inserisci gli scrittori del fumetto"name="writers" value="{{old("writers", $selectedComic->writers)}}">

                </div>

            </div>

            <div class="mt-5 d-flex justify-content-center gap-3">
                <button type="button" class="btn btn-secondary btn-lg border-0 rounded-50"><a
                        class="text-decoration-none text-light" href="{{ route('comics.index') }}">CANCEL</a></button>
                <button class="btn btn-primary btn-lg border-0 rounded-50"><a class="text-decoration-none text-light" href="{{ route('comics.show', $selectedComic->id) }}">EDIT</a></button>
            </div>
  
        </form>

    </div>
@endsection
