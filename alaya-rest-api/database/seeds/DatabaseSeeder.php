<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'name'     => $faker->name,
                'username' => $faker->userName,
                'email'    => $faker->unique()->email,
                'password' => Hash::make('123456'),
                'address'  => $faker->address(),
                'branch'   => $faker->city(),
                'photo'    => $faker->imageUrl(640, 480),
                'position' => 'GUEST',
                'role'     => 1,
                'branch_id' => $i,
                'pin'      => Hash::make('123456'),
                'token'    => null
            ]);
            DB::table('treatments')->insert([
                'name'     => 'Therapeutic Message Spa',
                'desc'     => $faker->realText(200,2),
                'price'    => 'Rp.350.000',
                'photo'    => $faker->imageUrl(640, 480),
                'branch_id'=> 1
            ]);
            DB::table('absents')->insert([
                'users_id'      => $faker->randomNumber(),
                'longitude' => $faker->longitude,
                'latitude'  => $faker->latitude,
                'location'  => $faker->address,
                'time_entry' => $faker->time('H:i:s'),
                'time_out' => $faker->time('H:i:s'),
                'date' => $faker->date('d/m/Y'),
                'branch_id' => 1
            ]);
            DB::table('branches')->insert([
                'name'      => $faker->randomNumber(),
                'address' => $faker->longitude,
                'phone'   => $faker->randomNumber(),
                'maps' => 'https://www.google.co.id/maps/place/Bali/@-8.4543385,114.5110401,9z/data=!3m1!4b1!4m5!3m4!1s0x2dd22f7520fca7d3:0x2872b62cc456cd84!8m2!3d-8.3405389!4d115.0919509',
                'start' => $faker->time('H:i:s'),
                'end' => $faker->time('H:i:s'),
                'lat' => '-6.1666012',
                'long' => '106.6089758'
            ]);
            DB::table('history')->insert([
                'users_id' => $i,
                'treatment_id' => $i,
                'branch_id'=> $i,
                'date'   => $faker->date('d/m/Y'),
                'time_entry' => $faker->time('H:i'),
                'time_out' => $faker->time('H:i'),
                'duration' => $faker->time('H:i:s')
            ]);
        }
    }
}
