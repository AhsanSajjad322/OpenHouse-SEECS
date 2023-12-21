@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4">Welcome, {{ $student->name }}</h1>

        <h2 class="mt-4">Project Details</h2>

        <div class="card mb-3 bg-dark text-white">
            <div class="card-body">
                <h5 class="card-title">Project Name: {{ $project->name }}</h5>
                <p class="card-text">Description: {{ $project->detail }}</p>
                <p class="card-text">Category: {{ $project->category->name }}</p>
                <p class="card-text">Location: {{ $project->location->name }}</p>
                <p class="card-text">Status: {{ $project->status }}</p>
                <a href="{{ route('student.edit.project.detail', ['stdid' => $student->id ,'id' => $project->id]) }}" class="btn btn-primary">Edit Project</a>
            </div>
        </div>

        <h2 class="mt-4">Evaluation Status</h2>

        <div class="card bg-dark text-white">
            <div class="card-body">
                <p>Total Evaluators: {{ $totalEvaluators }}</p>
                <p>Evaluators Marked: {{ $evaluatorsMarkedCount }}</p>
                <p>Total Marks: {{ $totalMarks }}</p>
            </div>
        </div>
    </div>
@endsection
