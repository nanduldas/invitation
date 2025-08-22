<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attendees = [
            // Haldi event attendees
            ['name' => 'Priya Sharma', 'phone' => '9876543210', 'event' => 'haldi'],
            ['name' => 'Raj Patel', 'phone' => '8765432109', 'event' => 'haldi'],
            ['name' => 'Anita Gupta', 'phone' => '7654321098', 'event' => 'haldi'],
            ['name' => 'Vikram Singh', 'phone' => '6543210987', 'event' => 'haldi'],
            ['name' => 'Meera Joshi', 'phone' => '5432109876', 'event' => 'haldi'],
            
            // Onam event attendees
            ['name' => 'Arun Nair', 'phone' => '9988776655', 'event' => 'onam'],
            ['name' => 'Lakshmi Menon', 'phone' => '8877665544', 'event' => 'onam'],
            ['name' => 'Suresh Kumar', 'phone' => '7766554433', 'event' => 'onam'],
            ['name' => 'Deepa Pillai', 'phone' => '6655443322', 'event' => 'onam'],
            ['name' => 'Ravi Krishnan', 'phone' => '5544332211', 'event' => 'onam'],
            ['name' => 'Geetha Varma', 'phone' => '4433221100', 'event' => 'onam'],
        ];

        foreach ($attendees as $attendee) {
            \App\Models\Attendee::create($attendee);
        }
    }
}
