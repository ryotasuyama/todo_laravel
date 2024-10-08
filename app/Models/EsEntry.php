<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EsEntry extends Model
{
    use HasFactory;
    protected $fillable = [
        'tag',
        'new_tag',
        'title',
        'content'
    ];
}
