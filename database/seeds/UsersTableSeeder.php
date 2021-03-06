<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        DB::table('users')->insert([
            'email'             => 'admin@localhost.com',
            'password'          => Hash::make('password'),
            'api_token'         => str_random(60)
        ]);

        DB::table('profiles')->insert([
            'user_id' => 1,
            'type' => 'database',
            'name' => 'Administrator'
        ]);
    }
}
