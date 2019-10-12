<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentList extends Model
{
    protected $guarded = ['id'];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'student_id');
    }

    public function assessor()
    {
        return $this->belongsTo(Assessor::class);
    }
}
