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
    public function run()
    {
        $this->call(MaestroSeeder::class);
        $this->call(AlumnoSeeder::class);
        $this->call(MateriasSeeder::class);
        $this->call(CursoSeeder::class);
    }
}
