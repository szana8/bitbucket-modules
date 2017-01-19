<?php

use App\dao\Role;
use App\dao\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

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
            'password'          => \Hash::make('password'),
            'api_token'         => 'test'
        ]);
    }
}
