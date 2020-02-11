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
        User::create([
            'name' => "Thành",
            'username' => 'lmt151099',
            'phone' => '0969546799',
            'password' =>Hash::make('lmt151099')
        ]);
    }
}
