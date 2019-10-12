<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class training_seminar extends Model
{
    protected $guarded = [
        'id'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
