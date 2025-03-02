<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->addImage('images/myths/flaragon.jpg', 'Flaragon', 'myth');
        $this->addImage('images/myths/mobycean.jpg', 'Mobycean', 'myth');
        $this->addImage('images/myths/flareagle.jpg', 'Flareagle', 'myth');
        $this->addImage('images/myths/terrafur.jpg', 'Terrafur', 'myth');
        $this->addImage('images/myths/aquashark.jpg', 'Aquashark', 'myth');
        $this->addImage('images/myths/nyxshade.jpg', 'Nyxshade', 'myth');
        $this->addImage('images/myths/flarewing.jpg', 'Flarewing', 'myth');
        $this->addImage('images/myths/shockfin.jpg', 'Shockfin', 'myth');
        $this->addImage('images/myths/verdantail.jpg', 'Verdantail', 'myth');
        $this->addImage('images/myths/boulderback.jpg', 'Boulderback', 'myth');
        $this->addImage('images/myths/emberclaw.jpg', 'Emberclaw', 'myth');
        $this->addImage('images/myths/glimmerscale.jpg', 'Glimmerscale', 'myth');
        $this->addImage('images/myths/shadowstalker.jpg', 'Shadowstalker', 'myth');
        $this->addImage('images/myths/torrentail.jpg', 'Torrentail', 'myth');
        $this->addImage('images/myths/swiftstrike.jpg', 'Swiftstrike', 'myth');
        $this->addImage('images/myths/necrothunder.jpg', 'Necrothunder', 'myth');
        $this->addImage('images/myths/auroraflame.jpg', 'Auroraflame', 'myth');
        $this->addImage('images/myths/bramblehorn.jpg', 'Bramblehorn', 'myth');
        $this->addImage('images/myths/mossclaw.jpg', 'Mossclaw', 'myth');
        $this->addImage('images/myths/quicksandile.jpg', 'Quicksandile', 'myth');
        $this->addImage('images/myths/wavewhisper.jpg', 'Wavewhisper', 'myth');
        $this->addImage('images/myths/whisperwind.jpg', 'Whisperwind', 'myth');
        
        $this->addImage('images/myths/carousel_1.jpg', 'carousel_1', 'carousel');
        $this->addImage('images/myths/carousel_2.jpg', 'carousel_2', 'carousel');
        $this->addImage('images/myths/carousel_3.jpg', 'carousel_3', 'carousel');

        $this->addImage('images/icons/dream.png', 'dream', 'icon');
        $this->addImage('images/icons/discover.png', 'discover', 'icon');
        $this->addImage('images/icons/explore.png', 'explore', 'icon');
        
        $this->addImage('images/legends/rahatiel.jpg', 'rahatiel', 'legend');
        $this->addImage('images/legends/maqa.jpg', 'maqa', 'legend');
    }

    private function addImage(string $path, string $name, string $category): void
    {
        $imagePath = public_path($path);

        if (!file_exists($imagePath)) {
            $this->command->error("Image not found at: $imagePath");
            return;
        }

        $originalBinary = file_get_contents($imagePath);

        $mimeType = mime_content_type($imagePath);

        Image::create([
            'name' => $name,
            'type' => $mimeType,
            'original' => $originalBinary,
            'preview' => $originalBinary,
            'category' => $category
        ]);

        $this->command->info("Image $name seeded successfully!");
    }
}