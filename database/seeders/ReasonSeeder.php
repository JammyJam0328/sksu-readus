<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reason;
class ReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reason::create([
            'title'=>'Offensive',
            'description'=>'This post is offensive',
        ]);
        Reason::create([
            'title' => 'Spam',
            'description' => 'This post is spam.',
        ]);
        Reason::create([
            'title' => 'Inappropriate',
            'description' => 'This post is inappropriate.',
        ]);
        Reason::create([
            'title' => 'Other',
            'description' => 'Please specify in the comment.',
        ]);
    }
}