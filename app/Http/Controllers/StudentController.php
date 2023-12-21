<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Project;


class StudentController extends Controller
{
    public function index($id){
        $student = Student::find($id);
        $project = $student->project;
        $totalMarks = 0;
        $evaluatorsMarkedCount=0;
        $totalEvaluators=0;
        foreach( $project->evaluations as $evaluation){
            $totalEvaluators += 1;
            if($evaluation->marks){
                $evaluatorsMarkedCount += 1; 
                $totalMarks += $evaluation->marks;
            }
        }
        return view('layouts.student_dashboard')->with([
            'project'=> $project,
            'totalEvaluators' => $totalEvaluators,
            'evaluatorsMarkedCount' => $evaluatorsMarkedCount,
            'totalMarks' => $totalMarks,
            'student' => $student,
        ]);
    }
    
    public function editForm($stdid,$id){
        $project = Project::find($id);
        $student = Student::find($stdid);
        return view('layouts.student_edit_project_detail', ['student' => $student, 'project' => $project]);
    }

    public function updateProject($stdid, $id){
        $project = Project::find($id);
        $newName = request()->input('project_name');
        $newDescription = request()->input('project_description');

        $project->name = $newName;
        $project->detail = $newDescription;
        $project->save();
        return redirect()->route('student.dashboard',['id'=>$stdid]);
    }
}
