@extends('layouts.app')

@section('title', 'About Us - Pro-Task')

@section('header')
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        About Pro-Task
    </h2>
@endsection

@section('content')
    <div class="prose dark:prose-invert max-w-none">
        <p>
            <strong>"Pro-Task"</strong> is a web application based on Laravel for project and task management. A user can
            register, create multiple projects, and within each project, they can create a list of tasks.
        </p>
        <p>
            The goal is to create a Single Page Application (SPA) feel for CRUD operations without full page reloads in some
            parts, leveraging the power of Laravel on the backend.
        </p>

        <h4>Core Technologies Used:</h4>
        <ul>
            <li><strong>Backend:</strong> Laravel Framework</li>
            <li><strong>Frontend:</strong> Blade, Tailwind CSS, Alpine.js</li>
            <li><strong>Database:</strong> MySQL</li>
        </ul>
    </div>
@endsection
