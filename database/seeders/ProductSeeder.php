<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::insert([
            // === EMAS ===
            [
                'name' => 'Emas 1g',
                'type' => 'emas',
                'weight' => 1.00,
                'description' => 'Ringan dan mudah diakses, cocok buat pemula investasi.',
                'price' => 1050000,
                'image_url' => '/images/emas-1g.png',
            ],
            [
                'name' => 'Emas 5g',
                'type' => 'emas',
                'weight' => 5.00,
                'description' => 'Pilihan populer untuk investasi menengah.',
                'price' => 5250000,
                'image_url' => '/images/emas-5g.png',
            ],
            [
                'name' => 'Emas 10g',
                'type' => 'emas',
                'weight' => 10.00,
                'description' => 'Investasi lebih serius dengan nilai stabil.',
                'price' => 10500000,
                'image_url' => '/images/emas-10g.png',
            ],

            // === PERAK ===
            [
                'name' => 'Perak 100g',
                'type' => 'perak',
                'weight' => 100.00,
                'description' => 'Perak batangan 100 gram dengan sertifikat keaslian.',
                'price' => 1200000,
                'image_url' => '/images/perak-100g.png',
            ],
            [
                'name' => 'Perak 500g',
                'type' => 'perak',
                'weight' => 500.00,
                'description' => 'Perak batangan 500 gram dengan sertifikat keaslian.',
                'price' => 6000000,
                'image_url' => '/images/perak-500g.png',
            ],
            [
                'name' => 'Perak 1kg',
                'type' => 'perak',
                'weight' => 1000.00,
                'description' => 'Perak batangan 1 kilogram berkualitas tinggi.',
                'price' => 12000000,
                'image_url' => '/images/perak-1kg.png',
            ],
        ]);
    }

}
