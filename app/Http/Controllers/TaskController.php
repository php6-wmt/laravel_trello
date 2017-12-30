<?php

namespace App\Http\Controllers;

use App\Model\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $task = task::all();
        return view('card.cardhome',['displayTask'=> $task]);
    }

}
