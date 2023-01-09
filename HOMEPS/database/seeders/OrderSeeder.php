<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1, 15) as $id){
            Order::create([
                "id_pc" => $id,
                "ids_product" => "1,2,3",
                "status" => 1,
            ]);
        }
        foreach(range(1, 15) as $id){
            Order::create([
                "id_pc" => $id,
                "ids_product" => "7,2,9",
                "status" => 2,
            ]);
        }
        foreach(range(1, 15) as $id){
            Order::create([
                "id_pc" => $id,
                "ids_product" => "1,5,4,7",
                "status" => 3,
            ]);
        }
    }
}
