<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $room = [
            [
                'image' => 'https://i.pinimg.com/236x/11/b6/dd/11b6dd79ede8bca116ad78320cad27de.jpg',
                'occupancy' => 2,
                'price' => 900,
                'type' => "Single",
                'boarding_house_id' => 1,
            ],
            
            [
                'image' => 'https://i.pinimg.com/236x/42/b9/98/42b998998b1f07353dd2552d1336868b.jpg',
                'occupancy' => 4,
                'price' => 1000,
                'type' => "Double",
                'boarding_house_id' => 2,
            ],
            [
                'image' => 'https://i.pinimg.com/236x/64/77/7a/64777a0c34c214934226a6da6b857749.jpg',
                'occupancy' => 2,
                'price' => 800,
                'type' => "Double",
                'boarding_house_id' => 3,
            ],
            [
                'image' => 'https://i.pinimg.com/236x/e7/be/0e/e7be0e09f4bca606090a04f021f41fec.jpg',
                'occupancy' => 2,
                'price' => 900,
                'type' => "Single",
                'boarding_house_id' => 4,
            ],
        ];

        foreach($room as $room) {
            Room::create($room);
        }
    
    }
}
