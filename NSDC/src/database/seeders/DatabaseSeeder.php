<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\LocationMasterSeeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            UserTableSeeder::class,
            FieldSeeder::class,
            LocationMasterSeeder::class,
        ]);
    }
}
