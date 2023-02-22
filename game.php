<?php

    function check($player, $comp){
        $result = 'err';
        switch ($player){
            case '1':
                switch ($comp){
                    case '1':
                        $result = 'Tie';
                        break;
                    case '2':
                        $result = "You Lose";
                        break;
                    case '3':
                        $result = "You Win";
                        break;
                }
                break;
            case '2':
                switch ($comp){
                    case '1':
                        $result = 'You Win';
                        break;
                    case '2':
                        $result = "Tie";
                        break;
                    case '3':
                        $result = "You Lose";
                        break;
                }
                break;
            case '3':
                switch ($comp){
                    case '1':
                        $result = 'You Lose';
                        break;
                    case '2':
                        $result = "You Win";
                        break;
                    case '3':
                        $result = "Tie";
                        break;
                }
                break;
        }
        return $result;
    }

    if (!isset($_GET['who'])){
        die("Name parameter missing");
    }

    $RPS = array(); $RPS['1'] = 'Rock'; $RPS['2'] = 'Paper'; $RPS['3'] = 'Scissors';

    $output = '';

    if (!isset($_POST['answer']) || $_POST['answer'] == '0'){
        $output = 'Please select a strategy and press Play.';
    }   elseif  ($_POST['answer'] == '4'){
        for ($usr = 1; $usr < 4; $usr++){
            for ($cmp = 1; $cmp < 4; $cmp++){
                $output .= 'You Play='.$RPS[(string)$usr].' Computer Play='.$RPS[(string)$cmp].' Result='.check($usr, $cmp).'<br>';
            }
        }
        
    }   else{
            $cmp = (string)rand(1,3);
            $output = 'You Play='.$RPS[$_POST['answer']].' Computer Play='.$RPS[$cmp].' Result='.check($_POST['answer'], $cmp);
        }

?>

<html>
    <head><title>Kasimov Viacheslav</title></head>
    <body>
        <div>
        <h1>Rock Paper Scissors</h1>
        <p>Welcome: <?= $_GET['who'] ?>!</p>
        <form method="post">
            <select name="answer">
                <option value="0">Select</option>
                <option value="1">Rock</option>
                <option value="2">Paper</option>
                <option value="3">Scissors</option>
                <option value="4">Test</option>
            </select>
            <input type="submit" name="dopost" value="Play">
            <input type="button" name="escape" onclick="location.href='/index.php'; return false;" value="Logout">
        </form>
        <pre><?= $output ?></pre>
        </div>
    </body>
</html>