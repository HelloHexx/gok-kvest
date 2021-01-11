<?php

namespace App\Http\Controllers;

use App\Marker;
use App\marker_short;
use App\Task;
use App\User;
use App\User_Class\Game;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GameController extends Controller
{
    // private $short = array(1=>1,2=>2,3=>3,4=>4);
    public function GameView()
    {
        if (Auth::check()) {
            if (Auth::user()->game_passed) {
                return view('end');
            }
            if (Auth::user()->way) {
                $marker = Marker::where('task_num', Auth::user()->current_task)->first();
            } else {
                $marker = Marker::where('task_num', Auth::user()->current_task)->first();
            }
            $task = Task::where('task_num', (Auth::user()->current_task))->first();
            $passed = json_decode(Auth::user()->passed_tasks);
            return view('game', compact('marker', 'passed', 'task'));
        } else {
            return redirect('/');
        }

    }
    //Инициализация игры
    public static function GameInit(User $user)
    {
        $user->game = json_encode(new Game);
        $user->save();

    }
    ///Добавление сессии
    public function CheckSession(Request $request)
    {
        // var_dump($request->session()->get('Game'));
        if (
            Auth::check()
        ) {
            $game = json_decode(Auth::User()->game);
            $marker = Marker::where('task_num', $game->current_task)->first();
            if (empty($marker)) {
                return json_encode(false);
            }
            return view('game', compact('game', 'marker'));
        } else {
            return \json_encode(false);
        }
    }
    public function GetMarkers()
    {
        $markers = Marker::all();

        return response()->json(json_encode($markers));
    }
    public function CheckCode(Request $request)
    {
        // if (Auth::check()) {
        //     if (isset($request->code)) {
        //         $task = Task::where('task_num', (Auth::user()->current_task))->first();
        //         if (!isset($task)) {
        //             return redirect('/game')->with('status', 'TASK ERROR');
        //         }
        //         if ($request->code == $task->code) {
        //             $passed = json_decode(Auth::user()->passed_tasks);
        //             $marker = Marker::where('task_num', Auth::User()->current_task)->first();
        //             return view('task', compact('task', 'passed', 'marker'));
        //         } else {
        //             return redirect('/game')->with('status', 'Неверный код!');
        //         }
        //     } else {
        //         return back()->with('status', 'Вы ничего не вписали!');
        //     }
        // } else {
        //     return redirect('/')->with('status', 'Вы не авторизированы');
        // }

        if (Auth::check()) {
            $task = Task::where('task_num', (Auth::user()->current_task))->first();
            $passed = json_decode(Auth::user()->passed_tasks);
            $marker = Marker::where('task_num', Auth::User()->current_task)->first();
            return view('task', compact('task', 'passed', 'marker'));
        } else {
            return redirect('/')->with('status', 'Вы не авторизированы');
        }
    }
    public function NewGame(Request $request)
    {
        if (Auth::check()) {
            Auth::user()->passed_tasks = '{"passed_tasks":[]}';
            Auth::user()->current_Task = 1;
            Auth::user()->game_passed = false;
            Auth::user()->way = NULL;
            $request->session()->forget('visit');
            Auth::user()->save();
            return redirect('/game');
        }
        return back();
    }
    // Проверка вопроса
    public function CheckAnswer(Request $request)
    {
        if (Auth::check()) {
            if (isset($request->answer)) {
                $task = Task::where('task_num', Auth::user()->current_task)->first();
                $passed = json_decode(Auth::user()->passed_tasks);
                if ((mb_strtolower($request->answer, 'UTF-8')) == (mb_strtolower($task->answer, 'UTF-8'))) {
                    if (Auth::user()->way) {
                        if ($task->task_num == 6) {
                            $new_task = Task::where('id', 14)->first();
                           //$new_task = Task::latest()->first();
                        } else {
                            $new_task = Task::where('id', Auth::user()->current_task + 1)->first();
                        }
                    } else {
                        $new_task = Task::where('id', Auth::user()->current_task + 1)->first();
                    }
                    if (isset($new_task)) {
                        array_push($passed->passed_tasks, Auth::user()->current_task);
                        Auth::user()->current_task = $new_task->id;
                        Auth::user()->passed_tasks = json_encode($passed);
                        Auth::user()->save();
                    } else {
                        Auth::user()->score = 5051;
                        array_push($passed->passed_tasks, Auth::user()->current_task);
                        Auth::user()->passed_tasks = json_encode($passed);
                        Auth::user()->game_passed = true;
                        Auth::user()->save();
                        return redirect('/game')->with('status', 'Вы успешно закончили игру!');
                    }
                } else {
                    return back()->with('status-ask', "Неправильный ответ, попробуйте еще! Подсказка: " . $task->hint);
                }
                return redirect('/game')->with('status', "Отлично! Двигайтесь к следующей цели! :)");
            } else {
                return back()->with('status', "Введите ответ!");
            }
        } else {
            return redirect('/');
        }
    }
    public function MarkerView(Request $request, $id)
    {
        if (Auth::check()) {
            $marker = Marker::where('task_num', $id)->first();
            return view('marker', compact('marker'));

        } else {
            return back();
        }

    }
    public function Skip(Request $request)
    {
        if (Auth::Check()) {
            $task = Task::where('task_num', Auth::user()->current_task)->first();
            $passed = json_decode(Auth::user()->passed_tasks);
            $new_task = Task::where('id', Auth::user()->current_task + 1)->first();
            if (isset($new_task)) {
                array_push($passed->passed_tasks, Auth::user()->current_task);
                Auth::user()->current_task = $new_task->id;
                Auth::user()->passed_tasks = json_encode($passed);
                Auth::user()->save();
                return redirect('/game')->with('alert', "Правильный ответ: " . $task->answer);
            } else {
                Auth::user()->score = 5051;
                array_push($passed->passed_tasks, Auth::user()->current_task);
                Auth::user()->passed_tasks = json_encode($passed);
                Auth::user()->game_passed = true;
                Auth::user()->save();
                return redirect('/game')->with('status', 'Вы успешно закончили игру!');
            }
        }
    }
    public function Long(Request $request)
    {
        if (Auth::check()) {
            Auth::user()->way = false;
            Auth::user()->save();
            // GameController::NewGame($request);
            return redirect('/game');
        }
    }
    public function Short(Request $request)
    {
        if (Auth::check()) {
            Auth::user()->way = true;
            Auth::user()->save();
            // GameController::NewGame($request);
            return redirect('/game');
        }
    }
}
