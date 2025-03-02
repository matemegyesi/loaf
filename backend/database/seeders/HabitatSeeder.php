<?php

namespace Database\Seeders;

use App\Models\Habitat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HabitatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Habitat::create([
            'name' => 'Grassland'
        ]);
        Habitat::create([
            'name' => 'Forest'
        ]);
        Habitat::create([
            'name' => 'Mountain'
        ]);
        Habitat::create([
            'name' => 'Cave'
        ]);
        Habitat::create([
            'name' => 'Beach'
        ]);
        Habitat::create([
            'name' => 'Lake'
        ]);
        Habitat::create([
            'name' => 'River'
        ]);
        Habitat::create([
            'name' => 'Desert'
        ]);
        Habitat::create([
            'name' => 'Swamp'
        ]);
        Habitat::create([
            'name' => 'Volcano'
        ]);
        Habitat::create([
            'name' => 'Sky'
        ]);
        Habitat::create([
            'name' => 'Ocean'
        ]);
        Habitat::create([
            'name' => 'Magic Realm'
        ]);
    }
}
