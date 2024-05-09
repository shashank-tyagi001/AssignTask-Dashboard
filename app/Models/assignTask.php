<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assignTask extends Model
{
    use HasFactory;

public $table = 'assign_tasks';

public $timestamps = false;

protected $fillable = [
    'project_id',
    'user_id',
    'task',
];

public function ProjectName()
{
    return $this->belongsTo(ProjectName::class, 'project_id');
}

public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
