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
            <h3 class="mb-4 text-lg font-bold">Tasks List</h3>
            @forelse ($project->tasks()->latest()->get() as $task)
                <div class="mb-4 flex items-center justify-between rounded-lg bg-white p-4 shadow dark:bg-gray-800">
                    <div class="flex items-center">
                        <button class="mr-4" type="submit">
                            @if ($task->is_completed)
                                <svg class="h-6 w-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            @else
                                <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            @endif
                        </button>
                        <span class="{{ $task->is_completed ? 'line-through text-gray-500' : '' }}">
                            {{ $task->title }}
                        </span>
                    </div>

                    <div class="ml-4 flex flex-shrink-0 space-x-2">
                        <a class="rounded-md bg-yellow-500 px-3 py-1 text-sm text-white hover:bg-yellow-600"
                            href="{{ route('tasks.edit', $task) }}">Edit</a>
                    </div>
                </div>
            @empty
                <div class="rounded-lg bg-white p-4 text-center shadow dark:bg-gray-800">
                    <p class="text-gray-500">This project has no tasks yet.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            <a class="rounded-md bg-blue-200 px-4 py-2 text-blue-800 no-underline hover:bg-blue-300 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500"
                href="{{ route('projects.tasks.create', $project) }}">Add new tasks</a>
            <a class="rounded-md bg-gray-200 px-4 py-2 text-gray-800 no-underline hover:bg-gray-300 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500"
                href="{{ route('projects.index') }}">Back to Projects</a>
        </div>
    </div>
@endsection
