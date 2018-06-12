<?php

use Illuminate\Database\Seeder;

class PlaywrightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Playwright::class, 10)->create();
    }
}
