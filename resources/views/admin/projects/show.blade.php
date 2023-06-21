@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-5">Dettaglio Progetto {{$project->title}}</h1>

        <div>
            <p>{!! $project->description !!}</p>

            <img src="{{ asset('storage/' .  $project?->image_path ) }}" alt="">
        </div>



    </div>
@endsection
