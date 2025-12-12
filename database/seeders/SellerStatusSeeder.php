<?php

namespace Database\Seeders;

use App\Models\SellerStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellerStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['name' => 'Pending', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Approved', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rejected', 'created_at' => now(), 'updated_at' => now()],
        ];

        SellerStatus::insert($statuses);
    }
}
