<?php

namespace Database\Seeders;

use App\Models\violation;
use Illuminate\Database\Seeder;

class ViolationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        violation::factory(20)->create();
    }
}
