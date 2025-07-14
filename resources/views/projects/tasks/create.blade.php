@extends('layouts.app')

@section('title', 'Create New Task')

@section('header')
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        Create New Task
    </h2>
@endsection

@section('content')
    <form class="space-y-6" action="{{ route('projects.tasks.store', $project) }}" method="POST">
        @csrf

        <x-form.input name="title" label="Task Title" required />
        <x-form.textarea name="description" label="Task Description" />
        <x-form.input name="deadline" type="date" label="Task Deadline" required />

        <div class="flex justify-end space-x-4">
            <x-link-button href="{{ route('projects.show', $project) }}" variant="secondary">
                Cancel
            </x-link-button>
            <x-button>Save Task</x-button>
        </div>
    </form>
@endsection
