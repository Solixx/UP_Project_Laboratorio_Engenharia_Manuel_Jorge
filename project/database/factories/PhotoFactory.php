<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Photo;
use App\Models\Product_Color;
use Illuminate\Support\Facades\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imagePath = public_path('imgs/prods');
        $images = File::allFiles($imagePath);
        $randomImage = $this->faker->randomElement($images);

        $destinationPath = public_path('storage/images');
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }
        
        File::copy($randomImage->getRealPath(), $destinationPath . '/' . $randomImage->getFilename());

        return [
            'product_color_id' => Product_Color::all()->random()->id,
            'img' => $randomImage->getFilename(),
            'imgPath' => 'storage/images/' . $randomImage->getFilename(),
        ];
    }
}
