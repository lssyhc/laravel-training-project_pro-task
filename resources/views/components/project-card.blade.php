@props(['project'])

<x-card {{ $attributes }}>
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">
                <a class="hover:underline" href="{{ route('projects.show', $project) }}">{{ $project->name }}</a>
            </h3>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                {{ Str::limit($project->description, 150) }}
            </p>
            <p class="text-meta mt-2">
                Created: {{ $project->formatted_created_at }}
                ({{ $project->created_at->diffForHumans() }})
            </p>
        </div>
        <div class="ml-4 flex flex-shrink-0 space-x-2">
            {{ $actions }}
        </div>
    </div>
</x-card>
