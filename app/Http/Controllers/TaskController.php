<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Request $request) {
        $user = User::find($request->user_id);

        if(!$user) return response()->json(['message' => 'User not found'], 404);

        $tasks_user_count = Task::where('user', '=', $user->name)->where('is_completed', '=', false)->get()->count();

        if($tasks_user_count >= 5) return response()->json(['message' => 'The user has 5 tasks incompleted, please complete some tasks and try again']);

        $task = new Task();

        $task->name = $request->name;
        $task->description = $request->description;
        $task->user = $user->name;
        $task->is_completed = false;
        $task->starts_at = date("Y-m-d H:i:s");
        $task->expired_at = $request->expired_at;
        $task->company_id = $request->company_id;

        $task->save();

        return response()->json([$task, $task->company][0]);
    }
}
