<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Task;

class TaskCompletedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $room = Task::find($id);
        $room->update(["is_completed" => 1]);
        $room->save();
        return redirect()->back();
    }
}
