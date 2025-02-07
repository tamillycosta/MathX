<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoadMapTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('roadmaps')->insert([
            ['name' => 'Fundamental'],  
            ['name' => 'Ensino Médio'],
        ]);
    }
}
