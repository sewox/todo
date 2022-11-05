<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Services\Task\TaskPlanService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(TaskPlanService $taskPlanService): Factory|View|Application
    {

        $taskPlanService->assigning();
        $developers = Developer::with(['tasks' => function($query){
            $query->orderBy('estimated_duration');
        }])->get();

        return view('tasks')
            ->with('developers', $developers);
    }
}
