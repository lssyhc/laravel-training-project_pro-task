@extends('layouts.app')

@section('title', $project->name)

@section('header')
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        {{ $project->name }}
    </h2>
@endsection

@section('content')
    <div class="prose dark:prose-invert max-w-none">
        <p>{{ $project->description }}</p>
        <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
            <p><strong>Created at:</strong> {{ $project->created_at->format('d F Y, H:i:s') }}
                ({{ $project->created_at->diffForHumans() }})</p>
            <p><strong>Last updated:</strong> {{ $project->updated_at->diffForHumans() }}</p>
        </div>

        <div class="mt-8 border-t pt-8">
            <h3 class="text-lg font-bold">Tasks</h3>
            <p class="italic text-gray-500">The list of tasks will be displayed here.</p>
        </div>

        <div class="mt-8">
            <a class="rounded-md bg-gray-200 px-4 py-2 text-gray-800 no-underline hover:bg-gray-300 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500"
                href="{{ route('projects.index') }}">Back to Projects</a>
        </div>
    </div>
@endsection
