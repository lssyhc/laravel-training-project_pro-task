@extends('layouts.app')

@section('title', $task->title)

@section('header')
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        {{ $task->title }}
    </h2>
@endsection

@section('content')
    <div class="prose dark:prose-invert max-w-none">
        <p>{{ $task->description }}</p>
        <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
            <p class="mb-4 text-red-500"><strong>Deadline:</strong> {{ $task->formatted_deadline }}
                ({{ $task->deadline->diffForHumans() }})</p>
            <p><strong>Created at:</strong> {{ $task->formatted_created_at }}
                ({{ $task->created_at->diffForHumans() }})</p>
            <p><strong>Last updated:</strong> {{ $task->updated_at->diffForHumans() }}</p>
        </div>

        <div class="mt-8">
            <x-link-button href="{{ route('projects.show', $task->project) }}" variant="secondary">
                Back to Project
            </x-link-button>
        </div>
    </div>
@endsection
