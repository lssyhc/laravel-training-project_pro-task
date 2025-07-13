@extends('layouts.app')
@section('title', 'Index Page')
@section('content')
    <div class="m-4">
        @if (session('success'))
            <div class="fixed bottom-3 right-3 rounded-xl bg-green-500 px-4 py-2 text-sm text-white" role="alert"
                x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90">
                <p>{{ session('success') }}</p>

                <button class="absolute bottom-0 right-0 top-0 px-4 py-3" @click="show = false">
                    <svg class="h-6 w-6 fill-current text-white" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </button>
            </div>
        @endif
        @if (!$projects->isEmpty())
            <div class="flex justify-between">
                <h1 class="mb-4 text-4xl font-bold">This is Index Page</h1>
                <button><a class="rounded-lg bg-blue-500 px-4 py-2 font-medium text-white"
                        href="{{ route('projects.create') }}">Create
                        Project</a></button>
            </div>
        @endif
        @forelse ($projects as $project)
            <div class="mb-2 rounded-lg bg-white p-4 shadow-md">
                <h3 class="text-lg font-semibold text-gray-800">{{ $project->name }}</h3>
                <p class="text-sm text-gray-500">{{ $project->description }}</p>
                <p class="text-sm text-gray-400">{{ $project->created_at->format('Y-m-d H:i:s') }}
                    ({{ $project->created_at->diffForHumans() }})
                </p>
            </div>
        @empty
            <div class="flex h-screen flex-col items-center justify-center text-4xl font-bold">
                <h1 class="mb-2 text-4xl font-bold">This is Index Page</h1>
                <h3 class="text-2xl font-normal text-gray-500">But there is no project yet</h3>
            </div>
        @endforelse
        <div class="m-2 mt-4">
            {{ $projects->links() }}
        </div>
    </div>
@endsection
