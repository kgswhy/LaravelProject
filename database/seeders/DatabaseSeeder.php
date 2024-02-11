<?php

namespace Database\Seeders;

use App\Models\Aspirasi;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Sahal Fajri',
            'email' => 'sahalfajri@gmail.com',
            'password' => bcrypt('12345')
        ]);

        Category::create([
            'ket_kategori' => 'Keamanan'
        ]);
        Category::create([
            'ket_kategori' => 'Kebersihan'
        ]);
        Category::create([
            'ket_kategori' => 'Kesehatan'
        ]);

        Aspirasi::create([
            'kode_pengaduan' => 'LSP123456789',
            'nik' => "1234567890123456",
            'category_id' => 2,
            'lokasi' => 'Jl. Jauh, Kejauhan, Tidak Dekat',
            'status' => 'Menunggu',
            'keterangan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente dolore officia eos repellat nam? Sequi eveniet laborum culpa, repudiandae perspiciatis quos consectetur doloremque quaerat dolorem? Officia tenetur facilis atque perspiciatis!',
            'gambar' => 'https://source.unsplash.com/random/400x300'
        ]);

        Aspirasi::factory(10)->create();
    }
}
