<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\Advertisment;

class AdvertismentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Advertisment=Advertisment::create([
            'name' =>'omar',
            'email' =>'omar@omar.com',
            'password' =>bcrypt('12345678'),
            'status' => '1',
        ]);
    }
}
