<?php

use Illuminate\Database\Seeder;
use App\Applicant;

class ApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Applicant::class, 50)->create();
    }
}
