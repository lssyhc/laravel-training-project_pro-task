@extends('layouts.app')
@section('title', 'Index Page')
@section('content')
    <div class="m-4">
        <h1 @class([
            'mb-4 text-4xl font-bold',
            'hidden' => @count($projects) === 0,
        ])>This is Index Page</h1>
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
