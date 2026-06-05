<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Category::insert([
            ['nama_category' => 'Puding Buah'],
            ['nama_category' => 'Puding Coklat'],
            ['nama_category' => 'Puding Susu'],
            ['nama_category' => 'Puding Premium']
        ]);

        Brand::insert([
            ['nama_brand' => 'Nutrijell'],
            ['nama_brand' => 'Swallow'],
            ['nama_brand' => 'Pondan'],
            ['nama_brand' => 'MamaSuka']
        ]);

        Product::insert([
            [
                'nama_produk' => 'Puding Mangga',
                'harga' => 15000,
                'category_id' => 1,
                'brand_id' => 1
            ],
            [
                'nama_produk' => 'Puding Coklat',
                'harga' => 18000,
                'category_id' => 2,
                'brand_id' => 2
            ],
            [
                'nama_produk' => 'Puding Susu',
                'harga' => 12000,
                'category_id' => 3,
                'brand_id' => 3
            ],
            [
                'nama_produk' => 'Puding Premium',
                'harga' => 25000,
                'category_id' => 4,
                'brand_id' => 4
            ]
        ]);
    }
}