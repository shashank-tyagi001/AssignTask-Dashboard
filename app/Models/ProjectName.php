<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectName extends Model
{
    use HasFactory;



        public $timestamps = false;

        protected $fillable = [
            'name',
            'startdate',
            'enddate',
            'comments',
        ];
}
