@extends('layouts.app')

@section('title', 'Edit Task')

@section('header')
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        Edit Task: {{ $task->title }}
    </h2>
@endsection

@section('content')
    <form class="space-y-6" action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <x-form.input name="title" label="Task Name" :value="$task->title" required />
        <x-form.textarea name="description" label="Task Description" :value="$task->description" />
        <x-form.input name="deadline" type="date" label="Task Deadline" :value="$task->deadline->format('Y-m-d')" required />

        <div class="flex justify-end space-x-4">
            <x-link-button href="{{ route('projects.show', $task->project) }}" variant="secondary">
                Cancel
            </x-link-button>
            <x-button>Update Task</x-button>
        </div>
    </form>
@endsection
