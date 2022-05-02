<?php

namespace Database\Seeders;

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

        $this->call(MonografiaSeeder::class);
        $this->call(AutorSeeder::class);
        $this->call(ArticuloSeeder::class);
        $this->call(ArticuloMonografiaSeeder::class);
        $this->call(ArticuloAutorSeeder::class);
        $this->call(UserSeeder::class);
    }
}
