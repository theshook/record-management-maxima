<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class licensure_exam extends Model
{
    protected $guarded = [
        'id'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
