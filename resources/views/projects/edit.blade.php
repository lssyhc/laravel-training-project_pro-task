@extends('layouts.app')

@section('title', 'Edit Project')

@section('header')
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        Edit Project: {{ $project->name }}
    </h2>
@endsection

@section('content')
    <form class="space-y-6" action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')

        <x-form.input name="name" label="Project Name" :value="$project->name" required />
        <x-form.textarea name="description" label="Description" :value="$project->description" />

        <div class="flex justify-end space-x-4">
            <x-link-button href="{{ route('projects.index') }}" variant="secondary">
                Cancel
            </x-link-button>
            <x-button>Update Project</x-button>
        </div>
    </form>
@endsection
