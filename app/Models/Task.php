<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = ['title', 'description', 'is_completed', 'deadline', 'project_id'];

    protected $casts = [
        'is_completed' => 'boolean',
        'deadline' => 'datetime'
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function getFormattedDeadlineAttribute()
    {
        return $this->deadline->format('d F Y');
    }

    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('d F Y, H:i:s');
    }

    public function toggleStatus()
    {
        $this->is_completed = !$this->is_completed;
        $this->save();

        return $this->is_completed ? 'The task is marked as complete!' : 'Task status is returned.';
    }
}
