<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    protected $fillable = ['user_id', 'university_id', 'faculty_name', 'specialty_name', 'year'];
}
