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
            <p class="mb-4 text-red-500"><strong>Deadline:</strong> {{ $task->deadline->format('d F Y') }}
                ({{ $task->deadline->diffForHumans() }})</p>
            <p><strong>Created at:</strong> {{ $task->created_at->format('d F Y, H:i:s') }}
                ({{ $task->created_at->diffForHumans() }})</p>
            <p><strong>Last updated:</strong> {{ $task->updated_at->diffForHumans() }}</p>
        </div>

        <div class="mt-8">
            <a class="rounded-md bg-gray-200 px-4 py-2 text-gray-800 no-underline hover:bg-gray-300 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500"
                href="{{ route('projects.show', $task->project) }}">Back to Project</a>
        </div>
    </div>
@endsection
