@extends('layouts.app')

@section('title', 'Create New Project')

@section('header')
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        Create New Project
    </h2>
@endsection

@section('content')
    <form class="space-y-6" action="{{ route('projects.store') }}" method="POST">
        @csrf

        <x-form.input name="name" label="Project Name" required />
        <x-form.textarea name="description" label="Description" />

        <div class="flex justify-end space-x-4">
            <x-link-button href="{{ route('projects.index') }}" variant="secondary">
                Cancel
            </x-link-button>
            <x-button>Save Project</x-button>
        </div>
    </form>
@endsection
