<?php

namespace Database\Seeders;

use App\Models\violation_type;
use Illuminate\Database\Seeder;

class ViolationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        violation_type::factory(20)->create();
    }
}
