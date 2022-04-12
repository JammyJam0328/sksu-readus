<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(CampusDepartmentProgramSeeder::class);
        // $this->call(InitialAccountSeeder::class);
        // $this->call(PrivacySeeder::class);
        $this->call(ReasonSeeder::class);
    }
}