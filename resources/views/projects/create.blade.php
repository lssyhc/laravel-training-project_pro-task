@extends('layouts.app')
@section('title', 'Create Page')
@section('content')
    <div class="flex h-screen flex-col items-center justify-center">
        <h1 class="mb-12 text-center text-4xl font-bold">Create Project</h1>
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <label class="font-semibold" for="name">Name: </label>
            <input class="rounded border p-2" id="name" name="name" type="text" value="{{ old('name') }}" />
            <label class="font-semibold" for="description">Description: </label>
            <input class="rounded border p-2" id="description" name="description" type="text"
                value="{{ old('description') }}" />
            <button class="ml-2 rounded-lg border p-2 font-semibold" type="submit">Create</button>
        </form>
    </div>
@endsection
