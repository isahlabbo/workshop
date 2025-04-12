<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tool;
use App\Models\Project;

class ProjectToolController extends Controller
{
    public function register(Request $request, $projectId)
    {
        $request->validate(['name'=>'required']);

        $project = Project::find($projectId);

        $project->tools()->firstOrCreate(['name'=>$request->name]);

        return redirect()->route('programme.bootcamp.project.index',[$project->bootcamp->id])->withToastSuccess('Project Tool Updated');
    }

    public function update(Request $request, $toolId)
    {
        $request->validate(['name'=>'required']);

        $tool = Tool::find($toolId);

        $tool->update(['name'=>$request->name]);

        return redirect()->route('programme.bootcamp.project.index',[$tool->project->bootcamp->id])->withToastSuccess('Project Tool Updated');
    }

    public function delete($toolId)
    {
      

        $tool = tool::find($toolId);

        $tool->delete();

        return redirect()->route('programme.bootcamp.project.index',[$tool->project->bootcamp->id])->withToastSuccess('Project Tool Deleted');
    }
}
