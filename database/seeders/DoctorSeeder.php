<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        DB::table('doctors')->insert([
//            [
//                'full_name' => Str::random(20),
//                'email' => Str::random(10) . '@gmail.com',
//                'password' => Hash::make('123456789'),
//                'building_number' => Str::random(3),
//                'phone_number' => Str::between('', '0','9'),
//                ''
//            ]
//        ]);


        Doctor::factory(40)->create();

    }


}
