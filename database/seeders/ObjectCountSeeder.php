<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ObjectCount;
use App\Models\Location;

class ObjectCountSeeder extends Seeder
{
    public function run()
    {
        // Get existing locations (assuming they are seeded)
        $locations = Location::all();

        if ($locations->isEmpty()) {
            $this->command->info('No locations found. Please seed the locations table first.');
            return;
        }

        // Sample object detection data
        $data = [
            ['type' => 'person', 'count' => 30, 'location_id' => $locations->random()->id],
            ['type' => 'vehicle', 'count' => 10, 'location_id' => $locations->random()->id],
            ['type' => 'bicycle', 'count' => 5, 'location_id' => $locations->random()->id],
            ['type' => 'person', 'count' => 45, 'location_id' => $locations->random()->id],
            ['type' => 'person', 'count' => 60, 'location_id' => $locations->random()->id],
            ['type' => 'vehicle', 'count' => 20, 'location_id' => $locations->random()->id],
        ];

        // Insert data into the object_counts table
        foreach ($data as $entry) {
            ObjectCount::create($entry);
        }

        $this->command->info('Object counts seeded successfully!');
    }
}
