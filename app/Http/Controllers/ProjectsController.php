<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;

use App\Project;
use App\Services\Twitter;
use App\User;
use App\Mail\ProjectCreated;
use Illuminate\Support\Facades\Mail;

class ProjectsController extends Controller
{
      public function __construct()
      {
          $this->middleware('auth');

      }

      public function index( )
      {
         //this will show all the projects of the user
          return view('projects.index',[
              'projects' => auth()->user()->projects // validate the user, then show projects
          ]);
      }

      public function create() //redirect the create page
      {
            return view('projects.create');
      }

      public function store() // this for creating the project and store it to the database
      {


        $attributes = $this->validateProject(); //validate attribute literally, there a lot of way in validating

          $attributes['owner_id'] = auth()->id();
          Project::create($attributes);

          /*other way of creating
          and saving it*/

         // Project::create(request(['title','description']));

          // Project::create([
          //     'title' => request ('title'),
          //     'description' => request ('description')
          // ]);

          // $project = new Project();
          //
          // $project -> title=request('title');
          // $project -> description=request('description');
          //
          // $project -> save();

          return redirect('/projects');
      }


      public function show(Project $project) //this will show the selected project among all the project/s
      {
        //this is very helpful, because this validate if the the ID is existing and if not PAGE 403 will be redirected
        abort_if($project ->owner_id!== auth()->id(),403);

        //$this->authorize('update',$project);

        // if(\Gate::denies('update',$project)){
        //     abort(403);
        // }

         return view('projects.show',compact('project')); //compact is PHP function create an array in this contains the project of the user

      }


      public function edit(Project $project, User $user) //this method will find the user then redirect to the edit page and be updated
       {

         // $project = Project::findOrFail($id);
          abort_if($project ->owner_id!== auth()->id(),403); // return 403 if the id did not exist

          return view('projects.edit',compact(['project','user']));
       }


       public function update(Project $project) //this method update selected project
         //$this->authorize('update',$project);
         abort_if($project ->owner_id!== auth()->id(),403);

          //alternative way
          //$project->update(request(['title','description']));

          $project->update($this->validateProject()); /*this method 'update' here is a helper function from laravel validateProject method
                  I made to validate the request of the user*/

          // $project = Project::findOrFail($id);
          // $project->title = request('title');
          // $project->description = request('description');
          //
          // $project->save();

          return redirect('/projects'); // returns to project page of the user
       }

       public function destroy(Project $project) //this will delete the project
       {
         // $this->authorize('update',$project);

          abort_if($project ->owner_id!== auth()->id(),403); //valdate if the id is existing
          $project->delete(); //easy call function to delete the project
          // Project::findOrFail($id)->delete(); //other way

         return redirect('/projects'); // return to project page of the user
       }

       protected function validateProject() //I define this function, for validating the request and cleaner code
       {
            return request()->validate([
                 'title'=> ['required','min:3'],
                 'description' =>['required','min:3']
            ]);
       }

}
