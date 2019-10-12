<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestCertificate extends Model
{
    protected $guarded = [
        'id'
    ];

    public function generateReferenceNumber()
    {
        $letters = 'abcdefghijklmnopqrstuvwxyz';  // selection of a-z
        $string = '';  // declare empty string
        for ($x = 0; $x < 3; ++$x) {  // loop three times
            $string .= $letters[rand(0, 25)] . rand(0, 9);  // concatenate one letter then one number
        }
        return strtoupper($string);
    }

    public function qualification()
    {
        return $this->belongsTo(Qualification::class);
    }
}
