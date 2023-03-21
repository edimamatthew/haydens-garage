<?php

namespace Database\Seeders;

use App\Models\Slot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startTime = strtotime('9:00am');
        $endTime = strtotime('5:00pm');

        $slots = [];

        // Loop from the start time and add 30 minutes on each run
        while ($startTime < $endTime) {
            $start = date('H:i:s', $startTime);
            $end = date('H:i:s', strtotime('+30 minutes', $startTime));
            $slots[] = ['start_time' => $start, 'end_time' => $end];
            $startTime = strtotime('+30 minutes', $startTime);
        }

        Slot::insert($slots);
    }
}
