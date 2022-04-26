<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Tweet;
use Illuminate\Database\Seeder;

class TweetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 10件のつぶやきレコードを作成し、それぞれのつぶやきに4枚の画像を紐付ける
        Tweet::factory()->count(10)->create()->each(fn($tweet) =>
        Image::factory()->count(4)->create()->each(fn($image) =>
        $tweet->images()->attach($image->id)));
    }
}
