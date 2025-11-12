<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {

            // capacity default
            $capacity = 20;

            // exceptions
            if ($i == 1) {
                $capacity = 50;
            }
            if ($i == 2 || $i == 10) {
                $capacity = 30;
            }

            Room::updateOrCreate(
                ['name' => 'Room ' . $i], // lookup
                ['capacity' => $capacity] // set/update
            );
        }
    }
}
