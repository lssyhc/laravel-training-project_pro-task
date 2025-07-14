@extends('layouts.app')

@section('title', 'All Projects')

@section('header')
    <div class="flex items-center justify-between">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            All Projects
        </h2>
        <div class="flex space-x-4">
            <x-link-button href="{{ route('projects.trash') }}" variant="secondary">
                View Trash
            </x-link-button>
            <x-link-button href="{{ route('projects.create') }}">
                Create New Project
            </x-link-button>
        </div>
    </div>
@endsection

@section('content')
    <div class="space-y-6">
        @forelse ($projects as $project)
            <x-project-card :project="$project">
                <x-slot name="actions">
                    <x-link-button href="{{ route('projects.edit', $project) }}" variant="warning" size="small">
                        Edit
                    </x-link-button>
                    <form action="{{ route('projects.destroy', $project) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this project?');">
                        @csrf
                        @method('DELETE')
                        <x-button variant="danger" size="small">Delete</x-button>
                    </form>
                </x-slot>
            </x-project-card>
        @empty
            <x-empty-state message="No projects found." action="create" :route="route('projects.create')" label="Create one" />
        @endforelse

        <div class="mt-8">
            {{ $projects->links() }}
        </div>
    </div>
@endsection
