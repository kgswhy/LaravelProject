<?php

namespace Database\Factories;

use App\Models\Aspirasi;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;

class AspirasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Aspirasi::class;

    public function definition()
    {
        return [
            'kode_pengaduan' => 'LSP' . $this->faker->unique()->randomNumber(9),
            'nik' => $this->faker->numerify('##############'), // Gunakan numerify untuk menghasilkan 16 digit acak
            'category_id' => mt_rand(1, 3),
            'lokasi' => $this->faker->streetAddress(),
            'status' => $this->faker->randomElement(['Menunggu', 'Proses', 'Selesai']),
            'keterangan' => $this->faker->paragraph(),
            'gambar' => 'https://source.unsplash.com/random/400x300'
        ];
    }
}
