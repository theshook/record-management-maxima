<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = ['id'];

    public function assessor()
    {
        return $this->belongsTo(Assessor::class);
    }

    public function studentLists()
    {
        return $this->hasMany(StudentList::class);
    }
}
