<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{

    public function run(): void
    {
        $data = [
            ['name' => 'Jedzenie'],
            ['name' => 'Akcesoria']
        ];
        
        ProductCategory::insert($data);
    }
}