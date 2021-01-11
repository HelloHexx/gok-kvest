// AJAX('echo.php', 'POST', 1);

function StartGame() {
    SendData('http://hakkaton/startgame');
    alert('Игра сейчас начнется!:)')
    document.location.href = 'http://hakkaton/game';

}

function EndGame() {
    SendData('http://hakkaton/endgame');
    document.location.href = 'http://hakkaton';


}