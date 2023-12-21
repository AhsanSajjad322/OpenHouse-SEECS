<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluator;
use App\Models\Project;
use App\Models\Evaluation;

class EvaluatorController extends Controller
{
    public function index($id){
        $evaluator = Evaluator::find($id);
        $assignedProjects = $evaluator->projects;
        return view('layouts.eval_dashboard',['evaluator' => $evaluator, 'assignedProjects' => $assignedProjects]);
    } 

    public function projectDetails($evalid, $id){
        $project = Project::find($id); 
        return view('layouts.eval_view_project', ['project' => $project, 'evalid' => $evalid]);
    }

    public function updateMarks($evalid, $id){
        $newMarks = request()->input('projectMarks');
        $project = Project::find($id);
        $evaluation = Evaluation::where('evaluator_id',$evalid)->where('project_id',$id)->first();
        $evaluation->marks = $newMarks;
        $evaluation->save();
        return redirect()->route('evaluator.dashboard', ['id'=>$evalid]);
    }
}
