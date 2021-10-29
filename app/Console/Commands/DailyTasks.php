<?php

namespace App\Console\Commands;

use App\Models\Reservation;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DailyTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "task:renew";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Renew the daily tasks";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Create new tasks
        $reservationsToday = Reservation::where(
            "check_in",
            "=",
            Carbon::today()->addHours(14)
        )->get();

        $dayTasks = [];
        foreach ($reservationsToday as $reservationToday) {
            $tasks = [];
            foreach ($reservationToday->packages as $package) {
                if ($package->is_task === 1) {
                    array_push($tasks, $package->name);
                }
            }
            if (count($tasks) > 0) {
                array_push($dayTasks, [
                    $reservationToday->rooms[0]->room_number => $tasks,
                ]);
            }
        }

        foreach ($dayTasks as $dayTask) {
            $roomNumbers = array_keys($dayTask)[0];
            $tasks = array_values($dayTask)[0];

            foreach ($tasks as $task) {
                Task::create([
                    "room_number" => $roomNumbers,
                    "name" => $task,
                    "is_completed" => 0,
                ]);
            }
        }
    }
}
