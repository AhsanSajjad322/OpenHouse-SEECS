@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <h2 class="text-white mb-4">Project Details</h2>

        <div class="card mb-3 bg-dark text-white">
            <div class="card-body">
                <h5 class="card-title">Project Name: {{ $project->name }}</h5>
                <p class="card-text">Location: {{ $project->location->name }}</p>
                <p class="card-text">Status: {{ $project->status }}</p>
            </div>
        </div>

        <h3 class="text-white mb-3">Evaluators</h3>

        @if ($project->evaluators->isEmpty())
            <p class="text-white">No evaluators assigned.</p>
            <a href="{{-- route('assignEvaluator', ['projectId' => $project->id]) --}}" class="btn btn-primary">Assign Evaluator</a>
       @else
            <ul class="list-unstyled text-white">
                @foreach ($project->evaluators as $evaluator)
                    <ul class="mb-3">
                        <li>{{ $evaluator->name }}</li>
                        @foreach ($evaluator->evaluations as $evaluation)
                            <li>Marks: {{ $evaluation->marks }}</li>
                        @endforeach
                    </ul>
                @endforeach
            </ul>
       @endif

        <h3 class="text-white mb-3">Location</h3>

        <form method="POST" action="{{ route('updateProjectLocation', ['id' => $project->id]) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="projectLocation" class="form-label">Select Project Location:</label>
                <div class="input-group">
                    <select id="projectLocation" name="projectLocation" class="form-select" required>
                        @foreach ($availableLocations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Location</button>
        </form>

    </div>
@endsection
