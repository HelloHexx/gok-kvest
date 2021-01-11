<?php

namespace App\Http\Controllers;

use App\Marker;
use App\Task;
use App\User;
use App\User_Class\Game;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GameController extends Controller
{
    //Инициализация игры
    public function GameInit(Request $request)
    {
        $result = false;
        if (Auth::check()) {
            $game = new Game;
            $game = json_encode($game);
            $result = true;
            return json_encode($result);
        } else {
            return json_encode($result);
        }

    }
    ///Добавление сессии
    public function CheckSession(Request $request)
    {
        var_dump($request->session()->get('Game'));
        // if (
        //     Auth::check()
        // ) {
            $game = \json_decode($game);
            $marker = Marker::where('task_num', $game->current_task)->first();
            if(empty($marker)){
                return json_encode(false);
            }
            return view('game', compact('game', 'marker'));
        // }
        // else{
        //     return \json_encode(FALSE);
        // }
    }
    //Проверка задания
    public function TaskControll(Request $request, $id)
    {
        $game = $game;
        if ($game->current_task = $id) {
            return ('Вы нашли ключ!');
        } else {
            return ('Ой, нет! Вы пришли не туда :C');
        }

    }
    public function GetMarkers()
    {
        $markers = Marker::all();

        return response()->json(json_encode($markers));
    }
  

    public function EndGame(Request $request)
    {
        $game = json_encode(NULL);
    }
    public function CheckCode(Request $request)
    {
        $result = false;
        $game =  $game;;
        $task = Task::where('task_num', $game->current_task)->first();
        if (!isset($task)) {
            return back();
        }
        if ($request->code == $task->code) {
            return view('task', compact('task'));
            // if ($game->PassTask()) {

            //     $result = true;
            // }
        }
        return back();

    }
    public function CheckAnswer(Request $request)
    {
        $game =  $game;
        $task = Task::where('task_num', $game->current_task)->first();
        if ($request->answer = $task->answer) {
            if ($game->PassTask()) {

                $result = true;
                session()->put('Game', $game);
            } else {
                $game->score = "Вы прошли игру,ваши очки:$game->score";

                session()->put('Game', $game);

            }
        }
        // $request->session()->forget('Game');
        // $request->session()->regenerate();

        // \var_dump($game);

        return redirect('/game');
    }
}
