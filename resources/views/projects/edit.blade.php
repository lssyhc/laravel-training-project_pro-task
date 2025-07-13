@extends('layouts.app')
@section('title', 'Edit Page')
@section('content')
    <div class="flex h-screen flex-col items-center justify-center">
        <h1 class="mb-12 text-center text-4xl font-bold">Edit Project</h1>
        <form action="{{ route('projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')
            <label class="font-semibold" for="name">Name: </label>
            <input class="rounded border p-2" id="name" name="name" type="text"
                value="{{ old('name', $project->name) }}" />
            @error('name')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
            <label class="font-semibold" for="description">Description: </label>
            <input class="rounded border p-2" id="description" name="description" type="text"
                value="{{ old('description', $project->description) }}" />
            @error('description')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
            <button class="ml-2 rounded-lg border p-2 font-semibold" type="submit">Edit</button>
        </form>
    </div>
@endsection
