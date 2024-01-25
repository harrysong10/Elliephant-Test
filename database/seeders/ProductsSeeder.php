<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $products = [
            [
                'id' => 1,
                'name' => 'Rabbit - Saddles',
                'price' => 14,
                'description' => '¸˛Ç◊ı˜Â¯˘¿',
                'feature_image' => '',
                'gallery_image' => '',
                'shipping_cost' => 95,
                'product_status' => 'active'
            ],
            [
                'id' => 2,
                'name' => 'Rabbit - Saddles',
                'price' => 14,
                'description' => '¸˛Ç◊ı˜Â¯˘¿',
                'feature_image' => '',
                'gallery_image' => '',
                'shipping_cost' => 95,
                'product_status' => 'active'
            ],
            [
                'id' => 3,
                'name' => 'Rabbit - Saddles',
                'price' => 14,
                'description' => '¸˛Ç◊ı˜Â¯˘¿',
                'feature_image' => '',
                'gallery_image' => '',
                'shipping_cost' => 95,
                'product_status' => 'active'
            ],
            [
                'id' => 4,
                'name' => 'Rabbit - Saddles',
                'price' => 14,
                'description' => '¸˛Ç◊ı˜Â¯˘¿',
                'feature_image' => '',
                'gallery_image' => '',
                'shipping_cost' => 95,
                'product_status' => 'active'
            ],
            [
                'id' => 5,
                'name' => 'Rabbit - Saddles',
                'price' => 14,
                'description' => '¸˛Ç◊ı˜Â¯˘¿',
                'feature_image' => '',
                'gallery_image' => '',
                'shipping_cost' => 95,
                'product_status' => 'active'
            ],
            [
                'id' => 6,
                'name' => 'Rabbit - Saddles',
                'price' => 14,
                'description' => '¸˛Ç◊ı˜Â¯˘¿',
                'feature_image' => '',
                'gallery_image' => '',
                'shipping_cost' => 95,
                'product_status' => 'active'
            ],
            [
                'id' => 7,
                'name' => 'Rabbit - Saddles',
                'price' => 14,
                'description' => '¸˛Ç◊ı˜Â¯˘¿',
                'feature_image' => '',
                'gallery_image' => '',
                'shipping_cost' => 95,
                'product_status' => 'active'
            ],
            [
                'id' => 8,
                'name' => 'Rabbit - Saddles',
                'price' => 14,
                'description' => '¸˛Ç◊ı˜Â¯˘¿',
                'feature_image' => '',
                'gallery_image' => '',
                'shipping_cost' => 95,
                'product_status' => 'active'
            ],
        ];

        foreach ($products as $product) {
            Products::create($product);
        }
    }
}
