<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    public $table = 'registrations';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];


}
