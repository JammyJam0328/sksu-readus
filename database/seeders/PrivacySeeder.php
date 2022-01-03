<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Privacy;
class PrivacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Privacy::create([
            'name' => 'School',
            'description' => 'All users in the school',
        ]);

        Privacy::create([
            'name' => 'Campus',
            'description' => 'All users in the campus',
        ]);
        
    }
}