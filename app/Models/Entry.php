<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'status',
        'next_interview_date',
        'result_notification_date',
        'memo'
    ];

    public function getNextSelectionDate()
    {
        return $this->next_selection_date;
    }

    public function getResultNotificationDate()
    {
        return $this->result_notification_date;
    }
}
