<?php

use Illuminate\Database\Seeder;
use App\Assessor;

class AssessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Assessor::class, 50)->create();
    }
}
