@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-5">Aggiungi un nuovo progetto</h1>

        @if ($errors->any()){
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        }
        @endif

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titolo Progetto (*)</label>
                <input
                  type="text"
                  class="form-control @error('title') is-invalid @enderror"
                  id="title"
                  name="title"
                  value="{{ old('title') }}">
                  @error('title')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Tipo di progetto</label>

                  <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                    <option value="">Seleziona il tipo di progetto</option>
                    @foreach ($types as $type )
                        <option value="{{ $type->id }}"
                           @if ($type->id == old('type_id')) selected  @endif >
                            {{ $type->name }}</option>
                    @endforeach
                  </select>
                  @error('type_id')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione Progetto (*)</label>
                <textarea
                  type="text"
                  class="form-control @error('description') is-invalid @enderror"
                  id="description"
                  name="description"
                >
                    {!! old('description') !!}
                </textarea>
                  @error('description')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
            </div>

            <div class="mb-3">
                <label for="image_path" class="form-label">Aggiungi un immagine</label>
                <input
                  type="file"
                  onchange="showImage(event)"
                  class="form-control mb-3"
                  id="image_path"
                  name="image_path"
                  >
                  <img src="" alt="" width="150" id="imgPrev" onerror="this.src= '/noimage.jpg'" >

            </div>

            <div class="mb-3">
                <label for="project_link" class="form-label">Link della Repo</label>
                <input
                  type="text"
                  class="form-control @error('project_link') is-invalid @enderror"
                  id="project_link"
                  name="project_link"
                  value="{{ old('project_link') }}">
                  @error('project_link')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
            </div>

            <div class="mb-3">
                <label for="collaborators" class="form-label">Collaboratori (separati da |)</label>
                <input
                  type="text"
                  class="form-control @error('collaborators') is-invalid @enderror"
                  id="collaborators"
                  name="collaborators"
                  value="{{ old('collaborators') }}">
                  @error('collaborators')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
            </div>

            <div class="mb-3">
                <label for="frameworks" class="form-label">Frameworks usati (separati da |)</label>
                <input
                  type="text"
                  class="form-control @error('frameworks') is-invalid @enderror"
                  id="frameworks"
                  name="frameworks"
                  value="{{ old('frameworks') }}">
                  @error('frameworks')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
            </div>

            <div class="mb-3">
                <label for="prog_languages" class="form-label">Linguaggi di programmazione usati (separati da |)</label>
                <input
                  type="text"
                  class="form-control @error('prog_languages') is-invalid @enderror"
                  id="prog_languages"
                  name="prog_languages"
                  value="{{ old('prog_languages') }}">
                  @error('prog_languages')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
            </div>

            <div class="mb-3">
                <label for="date_started" class="form-label">Data inizio progetto</label>
                <input
                  type="date"
                  class="form-control @error('date_started') is-invalid @enderror"
                  id="date_started"
                  name="date_started"
                  value="{{ old('date_started') }}">
                  @error('date_started')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
            </div>

            <div class="mb-3">
                <label for="date_ended" class="form-label">Data fine progetto</label>
                <input
                  type="date"
                  class="form-control @error('date_ended') is-invalid @enderror"
                  id="date_ended"
                  name="date_ended"
                  value="{{ old('date_ended') }}">
                  @error('date_ended')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
            </div>

            <button type="submit" class="btn btn-primary">Crea!</button>


        </form>



    </div>

    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );

        function  showImage(event){
            const  tagImage = document.getElementById('imgPrev');
            tagImage.src = URL.createObjectURL(event.target.files[0])

        }

    </script>

@endsection
