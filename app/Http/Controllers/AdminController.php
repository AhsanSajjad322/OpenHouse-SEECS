<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Project;
use App\Models\Location;

class AdminController extends Controller
{
    public function index($id){
        $admin = Admin::find($id);

        $projects = Project::all();
        return view('layouts.admin_dashboard')->with([
            'admin' => $admin,
            'projects' => $projects
        ]);
    }

    public function viewProject($id){
        $project = Project::find($id);
        if ($project == null) {
            abort(404);
        }
        $availableLocations = Location::whereDoesntHave('project')->get();
        return view('layouts.admin_project_details', ['project'=>$project, 'availableLocations'=>$availableLocations]);
    }

    public function updateLocation($id){
        $project = Project::findOrFail($id);
        $newlocationID = request()->input('projectLocation');
        if ($newlocationID != "") {
            $project->location_id = $newlocationID;
            $project->save();
            }
            return redirect()->route('admin.project.details', ['id' => $project->id]);
        }
    }
