@extends('layouts.app')

@section('title', 'Trashed Projects')

@section('header')
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        Trashed Projects
    </h2>
@endsection

@section('content')
    <div class="mb-6">
        <a class="text-indigo-600 hover:underline" href="{{ route('projects.index') }}">&larr; Back to All Projects</a>
    </div>
    <div class="space-y-6">
        @forelse ($projects as $project)
            <x-card>
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">
                            {{ $project->name }}
                        </h3>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            {{ Str::limit($project->description, 150) }}
                        </p>
                        <p class="text-meta mt-2">
                            Deleted at: {{ $project->formatted_deleted_at }}
                        </p>
                    </div>
                    <div class="ml-4 flex flex-shrink-0 space-x-2">
                        <form action="{{ route('projects.restore', $project) }}" method="POST">
                            @csrf
                            <x-button variant="success" size="small">Restore</x-button>
                        </form>
                        <form action="{{ route('projects.forceDelete', $project) }}" method="POST"
                            onsubmit="return confirm('This action is irreversible. Are you sure you want to permanently delete this project?');">
                            @csrf
                            @method('DELETE')
                            <x-button variant="danger" size="small">Delete Permanently</x-button>
                        </form>
                    </div>
                </div>
            </x-card>
        @empty
            <x-empty-state message="The trash is empty." />
        @endforelse

        <div class="mt-8">
            {{ $projects->links() }}
        </div>
    </div>
@endsection
