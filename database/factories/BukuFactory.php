<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode' => fake()->ean8(),
            'isbn' => fake()->isbn10(),
            'nama_buku' => fake()->sentence(),
            'pengarang' => fake()->name(),
            'penerbit' => fake()->company(),
            'tahun_terbit' => fake()->year(),
            'deskripsi' => fake()->paragraph(2),
            'status' => fake()->randomElement(['ada', 'tidak_ada'])
        ];
    }
}
