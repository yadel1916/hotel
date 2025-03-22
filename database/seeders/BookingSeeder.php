<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $booking = new Booking;
        //$booking->id= "1";
        $booking->description = "suit";
        $booking->user_id = "1";
        $booking->room_id = "1";
       
        
        $booking->save();
       
       
    }
}
