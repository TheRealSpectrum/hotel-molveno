<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Task;
use Carbon\Carbon;

class DailyTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        $dirtyRooms = Room::where("is_clean", "=", 0)->get();
        foreach ($dirtyRooms as $dirtyRoom) {
            Task::create([
                "room_number" => $dirtyRoom->room_number,
                "name" => "Room needs to be cleaned",
                "is_completed" => 0,
            ]);
        }
    }

    public function completed($id)
    {
        $room = Task::find($id);
        $room->update(["is_completed" => 1]);
        $room->save();
        return redirect()->back();
    }
}
