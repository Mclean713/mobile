<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buses;

class BusesSeeder extends Seeder
{
    public function run()
    {
        Buses::factory()->count(50)->create();
    }
}