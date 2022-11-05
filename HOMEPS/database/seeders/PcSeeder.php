<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pc;

class PcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1, 15) as $id){
            Pc::create([
                "name" => 'PC' . $id
            ]);
        }
    }
}
