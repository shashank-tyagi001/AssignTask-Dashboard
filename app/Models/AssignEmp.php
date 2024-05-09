<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignEmp extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'project_id',
        'employee_id',
        'task'
    ];
}
