<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
       	'name' => 'Super Admin',
       	'email' => 'supadmin@gmail.com',
        'password'	=> bcrypt("123456"),
        'is_admin'	=> true,
        'is_super'	=> true,      	
       	]);
    }
}
