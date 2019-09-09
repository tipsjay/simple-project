@extends('layout')


@section('content')
    <h1 class="title"> {{ $project->title}}</h1>

    <div class="content">
          {{ $project->description}}
          <p>
               <a href="/projects/{{$project->id}}/edit">Edit</a>
          </p>
    </div>

    @if ($project->tasks->count())
        <div class="box">
            @foreach($project->tasks as $task)
                <div>
                      <form action="/tasks/{{ $task->id }}" method="POST">
                        <!-- @if ($task->completed)
                              @method('DELETE')
                        @endif -->
                        @method('PATCH')
                        @csrf
                        <label for="completed" class="checkbox {{$task->completed ? 'is-complete' : ''}}">
                              <input type="checkbox" name="completed" onChange="this.form.submit()" {{$task->completed ? 'checked' : ''}} >
                                {{ $task->description }}
                        </label>
                      </form>
                </div>
            @endforeach
        </div>
    @endif

     <!-- add new task form -->
     <form  class="box" action="/projects/{{$project->id}}/tasks" method="POST">
              @csrf
              <div class="field">
                    <label for="description" class="label">New Task</label>

                    <div class="control">
                              <input type="text" name="description" class="input {{ $errors->has('description') ? 'is-danger' : '' }}" placeholder="New Task" required>
                    </div>
              </div>

              <div class="field">
                    <div class="control">
                          <button type="submit" class="button is-link">Add Task</button>
                    </div>

              </div>

              @include('errors')
     </form>

@endsection
