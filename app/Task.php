<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

   protected $guarded = []; // this is the reverse of fillable, this specifies which field are not mass assigned in this case it empty array

    public function project()
    {
      return $this->belongsTo(Project::class); //putting relation to the Project model
    }

    public function complete($completed = true)
    {
        //$this->update(['completed'=> $completed]);
        $this->update(compact('completed'));  //update the task if done true/false in database

    }

    public function incomplete(){ //reverse of the complete the task
        $this->update(['completed' => false]);
    }

}
