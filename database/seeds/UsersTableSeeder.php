<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Admin;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'username' => 'admin',
            'password' => Hash::make('12345678')
        ]);

        $faker = Faker\Factory::create();

        $limit = 50;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([
                'student_id' => $faker->unique()->numberBetween(1000, 9999),
                'name' => $faker->name,
                'username' => $faker->unique()->lastName,
                'gender' => $faker->boolean,
                'email' => $faker->email,
                'birthday' => '1999-12-8',
                'address' => $faker->city,
                'phone' => $faker->phoneNumber,
                'password' => Hash::make('12345678')
            ]);
        }
    }
}
