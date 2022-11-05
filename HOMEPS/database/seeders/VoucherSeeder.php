<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Voucher;
use Illuminate\Support\Carbon;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1, 15) as $id){
            Voucher::create([
                "name" => 'Voucher giảm giá ' . $id,
                "decrease" => $id*1000,
                "effective_date" => Carbon::now(),
                "expiration_date" => Carbon::now()->addDays(30),
                "voucher_desc" => "HomePS ưu đãi giảm ". $id . "k cho đơn mua hàng từ 0Đ. Áp dụng cho tất cả sản phẩm thuộc cửa hàng",
            ]);
        }
    }
}
