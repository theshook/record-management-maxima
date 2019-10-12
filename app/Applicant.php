<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $fillable = [];

    public function workExperiences()
    {
        return $this->hasMany(WorkExperience::class);
    }

    public function traningSeminars()
    {
        return $this->hasMany(training_seminar::class);
    }

    public function licensureExams()
    {
        return $this->hasMany(licensure_exam::class);
    }

    public function competencyAssessments()
    {
        return $this->hasMany(competency_assessment::class);
    }

    public function qualification()
    {
        return $this->belongsTo(Qualification::class);
    }

    public function studentLists()
    {
        return $this->hasMany(StudentList::class, 'student_id');
    }

    public function getLists($scheduled, $assessor_id)
    {
        return $this->where('qualification_id', $assessor_id)
            ->where('scheduled', $scheduled)
            ->orderBy('last_name', 'asc')
            ->paginate(5);
    }

    public function generateReferenceNumber()
    {
        $letters = 'abcdefghijklmnopqrstuvwxyz';  // selection of a-z
        $string = '';  // declare empty string
        for ($x = 0; $x < 3; ++$x) {  // loop three times
            $string .= $letters[rand(0, 25)] . rand(0, 9);  // concatenate one letter then one number
        }
        return strtoupper($string);
    }
}
