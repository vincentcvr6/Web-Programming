<?php
session_start();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Hotel Reservation Search</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
    <table>
        <tr >
            <th><a href="main.php"> <img src="https://cdn0.iconfinder.com/data/icons/building-vol-9-1/512/3-512.png"  width="100" height="100"></a></th>
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
<h2><b>Results: </b></h2>

<fieldset>
<?php

$file = file_get_contents('availablehotel.txt');
$rows = explode( $file);
array_shift($rows);

$downtown = $_POST['downtown'];
$mtl_east = $_POST['mtl_east'];
$mtl_west = $_POST['mtl_west'];
$old_port = $_POST['old_port'];

foreach($rows as $row => $data){

    $row_data = explode(":", $data);

    $info[$row]['street'] =  $row_data[2];
    $info[$row]['price'] = $row_data[3];
    $info[$row]['name'] = $row_data[0];
    $info[$row]['location'] = $row_data[1];


    if((isset($_POST['downtown']) && $info[$row]['location'] == 'Downtown'
            || isset($_POST['mtl_east']) && $info[$row]['location'] == 'Montreal East' || isset($_POST['mtl_west']) && $info[$row]['location'] == 'Montreal West'
            || isset($_POST['old_port']) && $info[$row]['location'] == 'Old Montreal')&&($_POST['prices'] == "No price limit" || $_POST['prices'] >= $info[$row]['price'])){
        if(!empty($_SESSION['login'])){
            echo 'Hotel ' . ($row+1) .':<br>';
            echo 'NAME: ' . $info[$row]['name'] . '<br />';
            echo 'STREET: ' . $info[$row]['street'] . '<br />';
            echo 'LOCATION: ' . $info[$row]['location'] . '<br />';
            echo '<br/>';
        }else{
            echo '<p>Hotel ' . ($row + 1) . ' LOCATION: ' . $info[$row]['location'] . '<br />';

            ?> <form action = "login.php" id = "button">
                <button type="submit">Login</button>
                </form><?php
        }
    }
}
?>
</fieldset>
</body>
</html>
