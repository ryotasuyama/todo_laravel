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
    ];
    public function scopeOrderByDueDate($query)
    {
        return $query->orderBy('due_date', 'asc');
    }
}
