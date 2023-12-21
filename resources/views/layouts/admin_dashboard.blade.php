@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <h1 class="text-white">Welcome, {{ $admin->name }}</h1>

        <h2 class="text-white mb-4">All Projects</h2>

        @forelse($projects as $project)
            <form method="GET" action="{{ route('admin.project.details', ['id' => $project->id]) }}">
                <div class="card mb-3 bg-dark text-white">
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->name }}</h5>
                        <p class="card-text">Location: {{ $project->location->name }}</p>
                        <p class="card-text">Status: {{ $project->status }}</p>
                    </div>
                    <button class="btn btn-primary" type="submit">View Details</button>
                </div>
            </form>
        @empty
            <p class="text-white">No projects available.</p>
        @endforelse

    </div>
@endsection
