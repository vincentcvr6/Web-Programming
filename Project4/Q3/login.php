<?php
session_start();

$user_input = $_POST['username'];
$password_input = $_POST['password'];

$rege1 = "/^[a-zA-Z0-9]*$/";
$rege2 = "/^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*)[0-9a-zA-Z]{6,}$/";

if(isset($_POST['login'])){
    if(preg_match($rege1, $user_input) && preg_match($rege2, $password_input)){

        $file = fopen('login.txt', 'r');
        while (!feof($file)) {
            $line = fgets($file);
            list($user, $password) = explode(':', $line);

            if (($user) == $user_input && ($password) == $password_input) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $user_input;
                header('Location: main.php');
                exit();
            }


            if(strpos(file_get_contents('login.txt'), $user_input) == false){
                file_put_contents('login.txt', "\n".$user_input. ':'. $password_input, FILE_APPEND);
                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $user_input;
                if (!empty($_SESSION['username'])) echo "Hello, " . $_SESSION['username'] . "!<br>";
                exit();
            }

            if(trim($user) == $user_input && trim($password) != $password_input){
                print "Invalid password!";
                break;
            }
      }
        fclose($file);
    }else
    print "This is not a valid login";
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Hotel Reservation Login</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
    <table>
        <tr >
            <th><a href="main.php"> <img src="https://cdn0.iconfinder.com/data/icons/building-vol-9-1/512/3-512.png" width="100" height="100"></a></th>
            <th class="header"> Hotel Reservation Form</th>
        </tr>
    </table>
    <form onload="Function()" id = "time"></form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        var timestp = '<?=time();?>';
        function update(){
            $('#time').html(Date(timestp));
            timestp++;
        }
        $(function(){
            setInterval(update);
        });

        document.getElementById("time").innerHTML = timestp;
    </script>
</head>

<body>
<form method = "post">
    <p>Username: <input type="text" name="username"></p>
    <p>Password: <input type="password" name="password"></p>
    <?php session_destroy();?>

    <button type="submit" name="login">Login</button>

    <p>
      A username can only contain uppercase and lowecase letters or digits (0-9) <br/>

      A password must have a minimum of 6 characters (letters and digits only)
      and contain at least one letter and one number
    </p>
</form>
</body>

<footer> <div id="footer"><a href="disc.html">Privacy/Disclaimer Statement</a></div></footer>
</html>
