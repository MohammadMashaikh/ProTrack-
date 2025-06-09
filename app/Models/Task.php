<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $guarded = [];
    protected $casts = [
        'start_date' => 'date',
        'due_date' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }


    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
