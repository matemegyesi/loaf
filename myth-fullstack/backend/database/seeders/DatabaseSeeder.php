<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ImageSeeder::class);
        $this->call(HabitatSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(ElementSeeder::class);
        $this->call(MythSeeder::class);
        $this->call(ElementMythSeeder::class);
        $this->call(LegendSeeder::class);
    }
}
