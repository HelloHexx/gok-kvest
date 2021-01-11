<?php
namespace App\User_Class;

use App\Marker;

class Game
{
    private $token;
    public $score;
    public $current_task;
    public $passed = array();

    public function __construct()
    {
        $max = Marker::max('task_num');
        $min = Marker::min('task_num');
        //Generate a random string.
        $this->token = openssl_random_pseudo_bytes(16);
        //Convert the binary data into hexadecimal representation.
        $this->token = bin2hex($this->token);
        $this->score = 0;
        $this->current_task = rand($min, $max);

    }
    static public function UpdateTask($game)
    {
        $max = Marker::max('task_num');
        $min = Marker::min('task_num');
        

        if (\in_array($min,$game->passed) and \in_array($max,$game->passed)){
            $game->score=$game->score+1000;
            return false;
        }

        do {

            $game->current_task = rand($min, $max);

        } while (in_array($game->current_task, $game->passed));
        $game->score=$game->score+100;
        return true;

    }
    public function GetData()
    {
        print("Token: $this->token\nScore: $this->score\nCurrent_Task: $this->current_task");
    }
    static public function PassTask($game)
    {
        array_push($game->passed, $game->current_task);
        if (Game::UpdateTask($game)) {
            return true;
        } else {
            // echo "Вы прошли игру";
            return false;
        }

    }
}
