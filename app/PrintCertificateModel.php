<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrintCertificateModel extends Model
{
    protected $guarded = ['id'];

    public function qualification()
    {
        return $this->belongsTo(Qualification::class);
    }
}
