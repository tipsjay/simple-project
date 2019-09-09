<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\Project;
class ProjectTasksController extends Controller
{



    public function store(Project $project) //storing the new task
    {
            // $attributes = request()->validate(['description'=>'required']);

            $project->addTask(
              request()->validate(['description'=>'required'])
            );

            return back();

            //$project->addTask(request('description'))
            // Task::create([
            //       'project_id' => $project->id,
            //       'description' => request('description')
            // ]);

    }


    public function update(Task $task) //if the task is already been done it will be updated in the database and will strikethrough
    {
          /* first way */
          // $task->update([
          //     'completed' => request()->has('completed')
          // ]);

          /* other ways */
          // if (request()->has('completed')){
          //         $task->complete();
          // }else{
          //    $task->incomplete();
          // }

          // $task->complete(request()->has('completed'));

          //request()->has('completed') ? 'completed' : 'incomplete';

          $method = request()->has('completed') ? 'complete' : 'incomplete';

          $task->$method();

          return back();
    }

}
