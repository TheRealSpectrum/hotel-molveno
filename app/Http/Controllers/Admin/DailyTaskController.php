<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Room;

class DailyTaskController extends Controller
{
    public function completed($id)
    {
        $task = Task::find($id);
        $room = Room::where("room_number", $task->room_number)->first();
        $task->update(["is_completed" => 1]);
        if (
            Task::where("name", "Room needs to be cleaned")->where(
                "is_completed",
                1
            )
        ) {
            $clean = Room::find($room->id);
            $clean->update(["is_clean" => 1]);
            $clean->save();
        }
        $task->save();
        return redirect()->back();
    }
}
