<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class InitialAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role'=>'admin',
            'role_type'=>'system-admin',
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin12345'),
        ]);
        User::create([
            'role'=>'user',
            'role_type'=>'student',
            'name'=>'Norjamille Kasan',
            'email'=>'jamkasan@gmail.com',
            'password'=>bcrypt('qwert12345'),
        ]);
        User::create([
            'role'=>'user',
            'role_type'=>'student',
            'name'=>'Rizky Fauzi',
            'email'=>'rizky@gmail.com',
            'password'=>bcrypt('qwert12345'),
        ]);

        User::create([
            'role'=>'user',
            'role_type'=>'teacher',
            'name'=>'Kakashi Senpai',
            'email'=>'teacher@gmail.com',
            'password'=>bcrypt('qwert12345'),
        ]);

         User::create([
            'role'=>'user',
            'role_type'=>'office-admin',
            'name'=>'Cashier',
            'email'=>'cashier@gmail.com',
            'password'=>bcrypt('qwert12345'),
        ]);
    }
}