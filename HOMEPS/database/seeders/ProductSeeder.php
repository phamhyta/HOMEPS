<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1, 15) as $id){
            Product::create([
                "name" => 'Sản phẩm ' . $id,
                "product_desc" => 'Sản phẩm ' .$id . ' nhập khẩu vị đào Nhật Bản là thức uống đặc biệt đến từ đất nước mặt trời mọc. Sản phẩm là sự kết hợp hoàn hảo giữa vị Coca truyền thống và vị đào thơm ngọt mang đến thức uống hấp dẫn và lạ miệng hơn bao giờ hết. Hương vị Coca nồng nàn giúp xua tan cơn khát tức thì giải nhiệt ngày nắng nóng. Sản phẩm hiện đang rất được ưa chuộng trên khắp thế giới.',
                "price" => $id*1400,
                "discount" => $id*1300,
                "thumbnail" => '["https://cdn.shopify.com/s/files/1/0563/5745/4002/products/142.png?v=1623399813","https://cdn.shopify.com/s/files/1/0563/5745/4002/products/146_1.jpg?v=1623399840","https://cdn.shopify.com/s/files/1/0563/5745/4002/products/147_1.jpg?v=1623399823"]',
                "url_image" => "https://cdn.shopify.com/s/files/1/0563/5745/4002/products/141_1.png?v=1623399805",
                "amount" => $id,
            ]);
        }
    }
}
