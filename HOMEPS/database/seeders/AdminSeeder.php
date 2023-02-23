<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $randPassword = 'Admin@2022';

        foreach(range(1, 15) as $id){
            Admin::create([
                "first_name" => 'Fname' . $id,
                "last_name" => 'Lname' . $id,
                "email" => 'admin'. $id .'@homepc.com',
                "password" => Hash::make($randPassword),
                "birthday" => Carbon::now()->subYear(20),
                "remember_token" => Str::random(10),
            ]);
        }
    }
}
