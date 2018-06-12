<?php

use Illuminate\Database\Seeder;

class PlaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Play::class, 20)->create();
    }
}
