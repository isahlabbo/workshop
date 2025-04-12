<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Step;
use App\Models\Project;

class ProjectStepController extends Controller
{
    public function register(Request $request, $projectId)
    {
        $request->validate(['title'=>'required']);

        $project = Project::find($projectId);

        $project->steps()->firstOrCreate(['title'=>$request->title]);

        return redirect()->route('programme.bootcamp.project.index',[$project->bootcamp->id])->withToastSuccess('Project Step Registered');
    }

    public function update(Request $request, $stepId)
    {
        $request->validate(['title'=>'required']);

        $step = Step::find($stepId);

        $step->update(['title'=>$request->title]);

        return redirect()->route('programme.bootcamp.project.index',[$step->project->bootcamp->id])->withToastSuccess('Project Step Updated');
    }

    public function delete($stepId)
    {
      

        $step = Step::find($stepId);

        $step->delete();

        return redirect()->route('programme.bootcamp.project.index',[$step->project->bootcamp->id])->withToastSuccess('Project Step Deleted');
    }
}
