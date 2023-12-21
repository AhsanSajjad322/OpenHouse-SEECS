@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4">Welcome, {{ $evaluator->name }}</h1>

        <h2 class="mt-3 mb-4">Assigned Projects</h2>

       @forelse($assignedProjects as $project)
            <div class="card mb-3 bg-dark text-white">
                <div class="card-body">
                    <h5 class="card-title">Title: {{ $project->name }}</h5>
                    <p class="card-text">Location: {{ $project->location->name }}</p>

                    <p class="card-text">Marks: {{ $project->evaluations->where('evaluator_id', $evaluator->id)->first()->marks ?? 'Not marked' }}</p>
                    <a href="{{ route('evaluator.view.projectDetails', ['evalid' => $evaluator->id, 'id' => $project->id]) }}" class="btn btn-primary">View Project</a>
                </div>
            </div>
        @empty
            <p>Projects have not yet been assigned</p>
        @endforelse

        <form method="POST" action="" class="mt-4">
            @csrf

            <div class="mb-3 bg-light p-4 bg-dark text-white">
                <h3 class="mb-3">Select Project Category Preference</h3>

                <label for="preference">Select Category Preference:</label>
                <select id="preference" name="preference" class="form-select">
                    <option value="gameDev">Game Dev</option>
                    <option value="webDev">Web Dev</option>
                    <option value="appDev">App Dev</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Update Preferences</button>
            </div>
        </form>
    </div>
@endsection
