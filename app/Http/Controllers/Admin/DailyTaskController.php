<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Task;

class DailyTaskController extends Controller
{
    public function completed($id)
    {
        $room = Task::find($id);
        $room->update(["is_completed" => 1]);
        $room->save();
        return redirect()->back();
    }
}
