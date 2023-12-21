@extends('layouts.app')

@section('content')
    <div class="container shadow p-4 mb-4 bg-dark text-white">

        <h2 class="mt-4">Project Details</h2>

        <div class="card mb-3 bg-dark text-white shadow">
            <div class="card-body">
                <h5 class="card-title">Project Name: {{ $project->name }}</h5>
                <p class="card-text">Description: {{ $project->detail }} </p>
                <p class="card-text">Group Members: {{ implode(', ', $project->students->pluck('name')->toArray()) }}</p>
                <p class="card-text">Category: {{ $project->category->name }}</p>
                <p class="card-text">Location: {{ $project->location->name }}</p>
                <p class="card-text">Status: {{ $project->status }}</p>
            </div>
        </div>

        <h3 class="mt-4">Mark Project</h3>

        <form method="POST" action="{{ route('evaluator.update.marks', ['evalid' => $evalid ,'id' => $project->id]) }}">
            @csrf
            @method('PUT')

            <div class="mb-3 bg-dark text-white p-4 shadow">
                <label for="projectMarks" class="">Mark the Project (1 - 10):</label>
                <input type="number" id="projectMarks" value="{{ $project->evaluations->where('evaluator_id', $project->id)->first()->marks ?? '' }}" name="projectMarks" class="form-control" min="1" max="10" step="0.5" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit Mark</button>
        </form>

    </div>
@endsection
