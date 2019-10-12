<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class competency_assessment extends Model
{
    protected $guarded = [
        'id'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
