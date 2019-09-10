
@extends('layout')

@section('content')
              <h1 class="title">Create Project</h1>

              <form method="POST" action="/projects" >
                  @csrf

                  <div class="field">
                      <label for="title" class="label">Title</label>

                      <div class="control">
                            <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }} " name="title" placeholder="Title" >
                      </div>

                  </div>

                  <div class="field">
                      <label for="description" class="label">Description</label>

                      <div class="control">
                            <textarea name="description"class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" rows="8" cols="80"  placeholder="Description" >   </textarea>
                      </div>
                  </div>

                  <div class="field">
                        <div class="control">
                              <button type="submit" class="button is-link">Create Project</button>
                        </div>
                  </div>


                  @include('errors')

              </form>

@endsection
