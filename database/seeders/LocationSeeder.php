<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    public function run()
    {
        Location::create([
            'name' => 'Mall Entrance2',
            'capacity' => 200,
            'type' => 'indoor',
            'latitude' => 25.276987,  // Example in Qatar
            'longitude' => 51.519287
        ]);

        Location::create([
            'name' => 'Parking Lot2',
            'capacity' => 500,
            'type' => 'outdoor',
            'latitude' => 25.283850,
            'longitude' => 51.530356
        ]);

        Location::create([
            'name' => 'Food Court2',
            'capacity' => 150,
            'type' => 'indoor',
            'latitude' => 25.288501,
            'longitude' => 51.528356
        ]);
    }
}