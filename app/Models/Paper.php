<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    public function vote()
    {
        return $this->hasOne('App\Models\Vote', 'id', 'paper_id');
    }
}
