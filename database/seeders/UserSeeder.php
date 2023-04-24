<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'mohammed',
            'DOB'=>'1900-02-02',
            'nationallity'=>'SYR',
            'blood_type'=>'A+',
            'phone'=>'0954566',
            'location'=>'Al_mohajreen',
            'street'=>'6th Avenue',
            'phone'=>'0954566',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

       User::factory(20)->create();
    }
}
