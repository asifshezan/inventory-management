<?php

namespace Database\Seeders;

use App\Models\Basic;
use App\Models\Social;
use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        Basic::create([
            'basic_status' => 1,
        ]);

        Social::create([
            'sm_status' => 1,
        ]);

        Contact::create([
            'cont_status' => 1,
        ]);
    }
}
