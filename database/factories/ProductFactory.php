<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        printf("Mengambil gambar makanan\n");
        $imageUrl = 'https://source.unsplash.com/random/300x300/?food';
        $downloadedFile = file_get_contents($imageUrl);
        $filename = 'product_' . uniqid().'.jpg'; // unique for filename
        Storage::disk('public')->put('products/' . $filename, $downloadedFile);
        $path = '/products/' . $filename;

        return [
            'name' => $this->faker->sentence(2),
            'price' => $this->faker->numberBetween(1, 10),
            'image' => $path,
        ];
    }
}
