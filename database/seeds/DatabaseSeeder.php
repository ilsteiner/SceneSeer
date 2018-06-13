<?php

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
        $this->call(PlaywrightsTableSeeder::class);
        $this->call(PlaysTableSeeder::class);
        $this->call(CharacterTableSeeder::class);
    }
}
