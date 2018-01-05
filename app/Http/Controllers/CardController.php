<?php

namespace App\Http\Controllers;

use App\Model\Card;
use App\Model\MainBoard;
use App\Model\Task;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index($id)
    {
        $card = Card::with(['task'])->where('mainboard_id', $id)->get();
        return view('card.cardhome', ['displayCard' => $card, 'id' => $id]);
    }

    public function create($id)
    {
        return view('card.create')->with('id', $id);
    }

    public function store(Request $request, $id)
    {

        $card = new Card();
        $card->mainboard_id = $id;
        $card->card_name = $request->card_name;
        $card->save();
        return redirect()->route('card.index', $id);
    }

    public function taskstore(Request $request)
    {
        $task = new Task();
        $data = $request->array;
        $id = $request->id;
        parse_str($data, $array);
        $card_id = $array['card_id'];
        $task->card_id = $card_id;
        $task->task_content = $array['task_name'];
        $task->task_status = 0;
        $order = Task::where('card_id', $card_id)->count();
        $task->task_order = $order + 1;
        $task->save();

        return redirect()->route('card.index', $id);
    }

    public function updatetask(Request $request)
    {

        $task = Task::find($request->task_id);
        $task->card_id = $request->card_id;
        $task->save();

        foreach ($request->order as $key => $id) {
            $task = Task::find($id);
            $task->task_order = $key;
            $task->save();
        }


    }

    public function updatestatus(Request $request)
    {
        $task_id = $request->task_id;
        $task = Task::find($task_id);
        $task->task_status = $request->status;
        $task->save();
    }

    public function deletetask(Request $request)
    {
        $task_id = $request->task_id;
        $task = Task::find($task_id);
        $task->delete();

    }

    public function updatetaskcontent(Request $request)
    {

//        return 'hello';
        $task_id = $request->task_id;
        $task = Task::find($task_id);
        $task->task_content = $request->task_content;
        $task->save();
    }

    public function updatecardcontent(Request $request)
    {

        $card_id = $request->card_id;
        $card = Card::find($card_id);
        $card->card_name = $request->card_name;
        $card->save();
    }
}
