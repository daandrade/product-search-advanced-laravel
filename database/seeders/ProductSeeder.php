<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::factory(50)->create();
    }
}
