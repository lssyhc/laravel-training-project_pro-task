@extends('layouts.app')

@section('title', 'Edit Task')

@section('header')
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        Edit Task: {{ $task->name }}
    </h2>
@endsection

@section('content')
    <form class="space-y-6" action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT') <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="title">Task Name</label>
            <input
                class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200"
                id="title" name="title" type="text" value="{{ old('title', $task->title) }}" required>
            @error('title')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="description">Task
                Description</label>
            <textarea
                class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200"
                id="description" name="description" rows="4">{{ old('description', $task->description) }}</textarea>
            @error('description')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="deadline">Task Deadline</label>
            <input
                class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200"
                id="deadline" name="deadline" type="date"
                value="{{ old('deadline', $task->deadline->format('Y-m-d')) }}" required>
            @error('deadline')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-4">
            <a class="rounded-md bg-gray-200 px-4 py-2 text-gray-800 hover:bg-gray-300 dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-500"
                href="{{ route('projects.show', $task->project) }}">Cancel</a>
            <button class="cursor-pointer rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700"
                type="submit">Update
                Task</button>
        </div>
    </form>
@endsection
