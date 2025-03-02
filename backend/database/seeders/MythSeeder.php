<?php

namespace Database\Seeders;

use App\Models\Myth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MythSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Myth::create([
            'name' => 'Flaragon',
            'desc' => "Flaragon, the Fire-type Pokémon, is a blazing creature with purple fur and ember-like eyes, capable of unleashing powerful fire attacks with its fiery breath.",
            'habitat_id' => 10,
            'size_id' => 2,
            'image_id' => 1
        ]);

        Myth::create([
            'name' => 'Mobycean',
            'desc' => "Mobycean is a majestic creature resembling a blend of whale and sea serpent, with shimmering scales and the ability to create powerful tidal waves.",
            'habitat_id' => 12,
            'size_id' => 3,
            'image_id' => 2
        ]);

        Myth::create([
            'name' => 'Flareagle',
            'desc' => "Flareagle is a fiery bird Pokémon with bat-like wings, soaring through the skies and hunting with blazing talons.",
            'habitat_id' => 3,
            'size_id' => 2,
            'image_id' => 3
        ]);

        Myth::create([
            'name' => 'Terrafur',
            'desc' => "Terrafur is a swift Ground-type Pokémon resembling a ferret, adept at digging burrows and navigating underground tunnels.",
            'habitat_id' => 1,
            'size_id' => 1,
            'image_id' => 4
        ]);

        Myth::create([
            'name' => 'Aquashark',
            'desc' => "Aquashark is a sleek Water-type Pokémon resembling a shark, effortlessly gliding through ocean currents with its sharp dorsal fin.",
            'habitat_id' => 6,
            'size_id' => 1,
            'image_id' => 5
        ]);

        Myth::create([
            'name' => 'Nyxshade',
            'desc' => "Nyxshade is a spectral Pokémon that haunts moonlit forests and ancient ruins. Nyxshade moves silently through the night, communicating with spirits.",
            'habitat_id' => 13,
            'size_id' => 3,
            'image_id' => 6
        ]);

        Myth::create([
            'name' => 'Flarewing',
            'desc' => "Flarewing's fiery wings illuminate the night sky with a dazzling display of sparks.",
            'habitat_id' => 10,
            'size_id' => 2,
            'image_id' => 7
        ]);

        Myth::create([
            'name' => 'Shockfin',
            'desc' => "Shockfin glides effortlessly through ocean currents, emitting electric pulses to communicate.",
            'habitat_id' => 12,
            'size_id' => 1,
            'image_id' => 8
        ]);

        Myth::create([
            'name' => 'Verdantail',
            'desc' => "Verdantail camouflages itself among lush foliage, its tail blooming with vibrant flowers.",
            'habitat_id' => 2,
            'size_id' => 1,
            'image_id' => 9
        ]);

        Myth::create([
            'name' => 'Boulderback',
            'desc' => "Boulderback roams mountain ranges, its sturdy shell deflecting falling rocks.",
            'habitat_id' => 3,
            'size_id' => 3,
            'image_id' => 10
        ]);

        Myth::create([
            'name' => 'Emberclaw',
            'desc' => "Emberclaw's sharp claws leave scorch marks on desert sands as it hunts for prey.",
            'habitat_id' => 8,
            'size_id' => 1,
            'image_id' => 11
        ]);

        Myth::create([
            'name' => 'Glimmerscale',
            'desc' => "Glimmerscale's iridescent scales reflect sunlight, mesmerizing those who catch its gaze.",
            'habitat_id' => 3,
            'size_id' => 2,
            'image_id' => 12
        ]);

        Myth::create([
            'name' => 'Shadowstalker',
            'desc' => "Shadowstalker haunts moonlit forests, its ethereal form blending with the shadows.",
            'habitat_id' => 2,
            'size_id' => 2,
            'image_id' => 13
        ]);

        Myth::create([
            'name' => 'Torrentail',
            'desc' => "Torrentail playfully swims in rivers, creating whirlpools with its powerful tail.",
            'habitat_id' => 7,
            'size_id' => 1,
            'image_id' => 14
        ]);

        Myth::create([
            'name' => 'Swiftstrike',
            'desc' => "Swiftstrike darts through storm clouds, harnessing lightning for its electrifying attacks.",
            'habitat_id' => 11,
            'size_id' => 1,
            'image_id' => 15
        ]);

        Myth::create([
            'name' => 'Auroraflame',
            'desc' => "Auroraflame's fiery body shimmers with the colors of the northern lights.",
            'habitat_id' => 10,
            'size_id' => 2,
            'image_id' => 16
        ]);

        Myth::create([
            'name' => 'Bramblehorn',
            'desc' => "Bramblehorn charges through dense forests, its thorny antlers protecting it from harm.",
            'habitat_id' => 2,
            'size_id' => 2,
            'image_id' => 17
        ]);

        Myth::create([
            'name' => 'Mossclaw',
            'desc' => "Mossclaw lurks in damp caves, its moss-covered claws blending seamlessly with its surroundings.",
            'habitat_id' => 3,
            'size_id' => 2,
            'image_id' => 18
        ]);

        Myth::create([
            'name' => 'Quicksandile',
            'desc' => "Quicksandile burrows through desert sands, ambushing prey with incredible speed.",
            'habitat_id' => 8,
            'size_id' => 1,
            'image_id' => 19
        ]);

        Myth::create([
            'name' => 'Wavewhisper',
            'desc' => "Wavewhisper sings haunting melodies along the shore, calling forth the tides.",
            'habitat_id' => 6,
            'size_id' => 1,
            'image_id' => 20
        ]);
    }
}
