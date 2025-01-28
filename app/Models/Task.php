<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag',
        'due_date',
        'task_content',
        'completed',
    ];

    public function toggleCompleted()
    {
        $this->completed = !$this->completed;
        $this->save();
    }
    public function scopeOrderByDueDate($query)
    {
        return $query->orderBy('due_date', 'asc');
    }
    
    public function getTaskDate()
    {
        return $this->due_date;
    }
}
