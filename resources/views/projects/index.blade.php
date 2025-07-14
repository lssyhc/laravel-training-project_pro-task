@extends('layouts.app')

@section('title', 'All Projects')

@section('header')
    <div class="flex items-center justify-between">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            All Projects
        </h2>
        <div class="flex space-x-4">
            <a class="rounded-md bg-gray-600 px-4 py-2 text-white hover:bg-gray-700" href="{{ route('projects.trash') }}">
                View Trash
            </a>
            <a class="rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700"
                href="{{ route('projects.create') }}">
                Create New Project
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="space-y-6">
        @forelse ($projects as $project)
            <div class="border-b border-gray-200 bg-white p-6 shadow-sm sm:rounded-lg dark:border-gray-700 dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">
                            <a class="hover:underline"
                                href="{{ route('projects.show', $project) }}">{{ $project->name }}</a>
                        </h3>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            {{ Str::limit($project->description, 150) }}
                        </p>
                        <p class="mt-2 text-xs text-gray-500 dark:text-gray-500">
                            Created: {{ $project->created_at->format('d M Y, H:i') }}
                            ({{ $project->created_at->diffForHumans() }})
                        </p>
                    </div>
                    <div class="ml-4 flex flex-shrink-0 space-x-2">
                        <a class="rounded-md bg-yellow-500 px-3 py-1 text-sm text-white hover:bg-yellow-600"
                            href="{{ route('projects.edit', $project) }}">Edit</a>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this project?');">
                            @csrf
                            @method('DELETE')
                            <button
                                class="cursor-pointer rounded-md bg-red-600 px-3 py-1 text-sm text-white hover:bg-red-700"
                                type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="rounded-lg bg-white p-6 text-center shadow-sm dark:bg-gray-800">
                <p class="text-gray-500 dark:text-gray-400">No projects found. <a class="text-indigo-600 hover:underline"
                        href="{{ route('projects.create') }}">Create one</a>!</p>
            </div>
        @endforelse

        <div class="mt-8">
            {{ $projects->links() }}
        </div>
    </div>
@endsection
