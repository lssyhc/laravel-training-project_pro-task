@extends('layouts.app')

@section('title', '404 - Not Found')

@section('content')
    <div class="flex flex-col items-center justify-center py-20">
        <h1 class="text-6xl font-bold text-indigo-600">404</h1>
        <h2 class="mt-4 text-2xl font-semibold text-gray-800 dark:text-gray-200">Page Not Found</h2>
        <p class="mt-2 text-gray-600 dark:text-gray-400">Sorry, the page you are looking for does not exist.</p>
        <a class="btn btn-primary mt-8 hover:underline" href="{{ route('projects.index') }}">
            Go to All Projects
        </a>
    </div>
@endsection
