<?php

use Illuminate\Database\Seeder;

class FragmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Fragment::class, 200)->create();
    }
}
