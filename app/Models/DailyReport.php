<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'project_name',
        'today_date',
        'firstPhase',
        'secondPhase',
        'thirdPhase',
        'fourthPhase'
    ];
}
