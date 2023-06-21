@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-5">Elenco progetti</h1>

        @if (session('deleted'))

            <div class="alert alert-success" id="delMsg">
                {{ session('deleted') }}
            </div>

        @endif

        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Repo Link</th>
                <th scope="col">Collaboratori</th>
                <th scope="col">Azioni</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project )

                <tr>
                  <td>{{$project->id}}</td>
                  <td class="table-success">{{$project->title}}</td>
                  <td class="table-warning">{{$project->project_link}}</td>
                  <td class="table-danger">{{$project->collaborators}}</td>
                  <td>
                      <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-success">DETTAGLIO</a>
                      <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">MODIFICA</a>
                      <form
                        action="{{ route('admin.projects.destroy', $project) }}"
                        method="POST"
                        onsubmit="return confirm('sei sicuro di voler eliminare questo elemento?')"
                        class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">ELIMINA</button>
                      </form>
                  </td>
                </tr>

                @endforeach

            </tbody>
          </table>

    </div>

    <script>
        const delMsg = document.querySelector('#delMsg');
        if (typeof(delMsg) != 'undefined' && delMsg != null){
            setInterval(() => {
                delMsg.classList.add('d-none')

            }, 5000);
        }

    </script>

@endsection
