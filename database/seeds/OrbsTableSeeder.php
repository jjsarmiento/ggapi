<?php

use Illuminate\Database\Seeder;

class OrbsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Orb::class, 10)->create();
    }
}
