<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            PcSeeder::class,
            VoucherSeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
