<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    //al comando: php artisan seed, viene lanciata questa funzione 
    public function run()
    {
        //al lancio del seed viene lanciato anche ProjectSeeder presente nello stesso namespace di questo seeder
        $this->call([
            ProjectSeeder::class
        ]);
    }
}
