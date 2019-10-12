<?php

use Illuminate\Database\Seeder;
use App\Verification;

class VerificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Verification::class, 50)->create();
    }
}
