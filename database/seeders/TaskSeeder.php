<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = Project::all();
        foreach ($projects as $project) {
            $numTasks = random_int(5, 10);

            Task::factory()->count($numTasks)->for($project)->create();
        }
    }
}
