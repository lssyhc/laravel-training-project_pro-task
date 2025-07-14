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
            <p><strong>Created at:</strong> {{ $project->formatted_created_at }}
                ({{ $project->created_at->diffForHumans() }})</p>
            <p><strong>Last updated:</strong> {{ $project->updated_at->diffForHumans() }}</p>
        </div>

        <div class="mt-8 border-t pt-8">
            <h3 class="mb-4 text-lg font-bold">Tasks List</h3>
            @forelse ($project->getLatestTasks() as $task)
                <x-task-item :task="$task">
                    <x-link-button href="{{ route('tasks.edit', $task) }}" variant="warning" size="small">
                        Edit
                    </x-link-button>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this task?');">
                        @csrf
                        @method('DELETE')
                        <x-button variant="danger" size="small">Delete</x-button>
                    </form>
                </x-task-item>
            @empty
                <x-empty-state message="This project has no tasks yet." />
            @endforelse
        </div>

        <div class="mt-8">
            <x-link-button href="{{ route('projects.tasks.create', $project) }}" variant="primary">
                Add new tasks
            </x-link-button>
            <x-link-button href="{{ route('projects.index') }}" variant="secondary">
                Back to Projects
            </x-link-button>
        </div>
    </div>
@endsection
