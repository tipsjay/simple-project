@extends('layout')


@section('content')
    <h1 class="title">Edit Project</h1>

    <form method="POST" action="/projects/{{$project->id}}" style="margin-bottom: lem;" >
        <!-- {{ method_field('PATCH') }}
        {{ csrf_field() }} -->
        @method('PATCH')
        @csrf

        <div class="field">
            <label for="title" class="label">Title</label>

            <div class="control">
                  <input type="text" class="input" name="title" placeholder="Title" value="{{ $project->title }}">
            </div>
        </div>

        <div class="field">
            <label for="description" class="label">Description</label>

            <div class="control">
                  <textarea name="description" class="textarea" rows="8" cols="80"> {{ $project->description }} </textarea>
            </div>
        </div>

        @include('errors')
        <div class="field">
              <div class="control">
                    <button type="submit" class="button is-link">Update Project</button>
              </div>
        </div>
    </form>

    <br>
    <form action="/projects/{{$project->id}}" method="POST" >
       @method('DELETE')
       @csrf

        <div class="field">
              <div class="control">
                    <button type="submit" class="button is-link">Delete Project</button>
              </div>
        </div>
    </form>
@endsection
