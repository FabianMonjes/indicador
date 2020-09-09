<?php

use App\UF;
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
        $ufs = factory(UF::class,10)->create();
    }
}
