<?php

use Illuminate\Database\Seeder;

class FakejobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Fake_jobs::class, 200)->create() ;
        //
    }
}
