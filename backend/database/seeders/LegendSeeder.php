<?php

namespace Database\Seeders;

use App\Models\Legend;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LegendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Legend::Create([
                "name" => "Rahatiel",
                "description" => "He is the Patron Saint of Eastern Valleys, a majestic and adult dragon, who roams the skies day and night, protecting that which is dear.",
                "strength" => 5,
                "caption" => "Last seen 24 years ago, near Ermir's Volcano",
                "habitat_id" => 3,
                "image_id" => 28
            ]);
        Legend::Create([
                "name" => "Maqa",
                "description" => "Maqa, the Great Sea Serpent, emerges from the deep with iridescent scales glinting in the subdued light. It's origins are unknown, but there is one call he answers",
                "strength" => 3,
                "caption" => "Last seen 3 years ago, on the Genesis Sea",
                "habitat_id" => 8,
                "image_id" => 29
            ]);
    }
}
