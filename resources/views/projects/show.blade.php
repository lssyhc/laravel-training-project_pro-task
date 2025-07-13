@extends('layouts.app')
@section('title', 'Show Page')
@section('content')
    <div class="flex h-screen flex-col items-center justify-center gap-2">
        <h3 class="text-lg font-bold text-gray-800">{{ $project->name }}</h3>
        <p class="text-sm font-semibold text-gray-500">{{ $project->description }}</p>
        <p class="text-sm text-gray-400">{{ $project->created_at->format('Y-m-d H:i:s') }}
            ({{ $project->created_at->diffForHumans() }})
        </p>
        <a class="text-sm font-semibold text-blue-500 hover:underline" href="{{ route('projects.index') }}">Back</a>
    </div>
@endsection
