<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index($bootcampId)
    {
        return view('programme.bootcamp.project.index',['bootcamp'=>Bootcamp::find($bootcampId)]);
    }

    public function update(Request $request, $projectId)
    {
        $request->validate(['name'=>'required', 'description'=>'required']);

        $project = Project::find($projectId);
        $project->update(['name'=>$request->name,'description'=>$request->description]);
        return redirect()->route('programme.bootcamp.project.index', [$project->bootcamp->id])->withToastSuccess('Project Updated');
    }

    public function delete($projectId)
    {
        $project = Project::find($projectId);
        foreach($project->tools as $tool){
            $tool->delete();
        }

        foreach($project->steps as $step){
            $step->delete();
        }

        $project->delete();
        return redirect()->route('programme.bootcamp.project.index', [$project->bootcamp->id])->withToastSuccess('Project Delete');
    }
}
