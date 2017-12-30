<?php

namespace App\Http\Controllers;

use App\Model\MainBoard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainBoardController extends Controller
{
    public function index()
    {
        $loginUserId = Auth::id();
        $board = MainBoard::all()->where('user_id', $loginUserId);
        return view('home', ['displayBoard' => $board]);
    }

    public function create()
    {
        return view('mainboard.create');
    }
    public function store(Request $request)
    {
        $board = new MainBoard();
        $board->user_id = Auth::id();
        $board->board_name = $request->board_name;
        $board->save();
        return redirect()->route('mainBoard.index');
    }
}