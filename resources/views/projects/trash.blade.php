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
            <div class="border-b border-gray-200 bg-white p-6 shadow-sm sm:rounded-lg dark:border-gray-700 dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">
                            {{ $project->name }}
                        </h3>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            {{ Str::limit($project->description, 150) }}
                        </p>
                        <p class="mt-2 text-xs text-gray-500 dark:text-gray-500">
                            Deleted at: {{ $project->deleted_at->format('d M Y, H:i') }}
                        </p>
                    </div>
                    <div class="ml-4 flex flex-shrink-0 space-x-2">
                        <form action="{{ route('projects.restore', $project) }}" method="POST">
                            @csrf
                            <button
                                class="cursor-pointer rounded-md bg-green-500 px-3 py-1 text-sm text-white hover:bg-green-600"
                                type="submit">Restore</button>
                        </form>
                        <form action="{{ route('projects.forceDelete', $project) }}" method="POST"
                            onsubmit="return confirm('This action is irreversible. Are you sure you want to permanently delete this project?');">
                            @csrf
                            @method('DELETE')
                            <button
                                class="cursor-pointer rounded-md bg-red-600 px-3 py-1 text-sm text-white hover:bg-red-700"
                                type="submit">Delete Permanently</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="rounded-lg bg-white p-6 text-center shadow-sm dark:bg-gray-800">
                <p class="text-gray-500 dark:text-gray-400">The trash is empty.</p>
            </div>
        @endforelse

        <div class="mt-8">
            {{ $projects->links() }}
        </div>
    </div>
@endsection
