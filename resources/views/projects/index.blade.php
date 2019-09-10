
@extends('layout')


@section('content')

    <h1 class="title">Projects</h1>
    <form class="" action="/projects/create">
      <div class="field">
            <div class="control">
                  <button type="submit" class="button is-link"> Create Project</button>
            </div>
      </div>
    </form>

    <ul>
    @foreach($projects as $project)
        <li>
           <a href="/projects/{{ $project->id}}">
             {{ $project->title }}
           </a>
        </li>
    @endforeach
  </ul>
@endsection
