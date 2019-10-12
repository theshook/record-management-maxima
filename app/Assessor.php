<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessor extends Model
{
    protected $guarded = ['id'];

    public function qualification()
    {
        return $this->belongsTo(Qualification::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
