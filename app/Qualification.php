<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Qualification extends Model
{
    protected $fillable = [
        'sector', 'course', 'accreditation', 'description'
    ];

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function assessors()
    {
        return $this->hasMany(Assessor::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function printCertificateModels()
    {
        return $this->hasMany(PrintCertificateModel::class);
    }

    public function requestCertificates()
    {
        return $this->hasMany(RequestCertificate::class);
    }
}
