<?php

namespace Database\Seeders;

use App\Models\Element;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Element::create([
            "element" => "Fire"
        ]);
        Element::create([
            "element" => "Electric"
        ]);
        Element::create([
            "element" => "Dragon"
        ]);
        Element::create([
            "element" => "Water"
        ]);
        Element::create([
            "element" => "Giant"
        ]);
        Element::create([
            "element" => "Flying"
        ]);
        Element::create([
            "element" => "Ground"
        ]);
        Element::create([
            "element" => "Ghost"
        ]);
        Element::create([
            "element" => "Spirit"
        ]);
        Element::create([
            "element" => "Grass"
        ]);
        Element::create([
            "element" => "Air"
        ]);
        Element::create([
            "element" => "Dark"
        ]);
        Element::create([
            "element" => "Ice"
        ]);
        Element::create([
            "element" => "Light"
        ]);
        Element::create([
            "element" => "Metal"
        ]);
        Element::create([
            "element" => "Poison"
        ]);
        Element::create([
            "element" => "Rock"
        ]);
        Element::create([
            "element" => "Time"
        ]);
        Element::create([
            "element" => "Sound"
        ]);
        Element::create([
            "element" => "Psychic"
        ]);
        Element::create([
            "element" => "Nature"
        ]);
        Element::create([
            "element" => "Chaos"
        ]);
    }
}
