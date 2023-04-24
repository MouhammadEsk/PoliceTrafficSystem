<?php

namespace Database\Seeders;

use App\Models\province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        province::factory(20)->create();
    }
}
