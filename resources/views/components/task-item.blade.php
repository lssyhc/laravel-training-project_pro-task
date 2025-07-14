@props(['task'])

<div class="mb-4 flex items-center justify-between rounded-lg bg-white p-4 shadow dark:bg-gray-800">
    <div class="flex items-center">
        <form action="{{ route('tasks.toggleComplete', $task) }}" method="POST">
            @csrf
            @method('PATCH')
            <button class="mr-4 cursor-pointer" type="submit">
                <x-task-status-icon :completed="$task->is_completed" />
            </button>
        </form>
        <a class="hover:underline" href="{{ route('tasks.show', $task) }}">
            <span class="{{ $task->is_completed ? 'line-through text-gray-500' : '' }}">
                {{ $task->title }}
            </span>
        </a>
    </div>

    <div class="ml-4 flex flex-shrink-0 space-x-2">
        {{ $slot }}
    </div>
</div>
