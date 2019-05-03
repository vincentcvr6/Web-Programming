<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Hotel Reservation </title>
    <link rel="stylesheet" type="text/css" href="main.css"/>

	<table>
		<tr >
		<th><a href="main.php"> <img src="https://cdn0.iconfinder.com/data/icons/building-vol-9-1/512/3-512.png" width="100" height="100"> </a></th>
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



<body >

<form method="post" action="search.php">

	<fieldset class="information">
	<legend>Reservation Information</legend>
	<label>Number of Rooms(max 5 people per room) </label>
	<input type="number" name="noOfRooms"><br><br>
	<label>Smoker? </label>
	<input type="radio" name="smoker" value="Yes">Yes
	<input type="radio" name="smoker" value="No">No<br><br>
	<label>Check-in: </label>
	<input type="data" name="checkIn" value="01/01/2019"><br><br>
	<label>Check-out: </label>
	<input type="data" name="checkOut" value="02/01/2019"><br><br>
	</fieldset>
	<br><br>
	<fieldset class="specifications">
	<legend>Room Specifications</legend>
	<ul>
	<li>
	<label>Size of room: </label><br>
	<label>Small:</label> <input type="checkbox" name="checkbox">
	<label>Regular:</label><input type="checkbox" name="checkbox">
	<label>Large:</label><input type="checkbox" name="checkbox">
	</li>
	<br>
	<li>
	<label>Do you have preferred locations for the hotel?</label><br>
	<input type="checkbox" name="downtown">Downtown
	<input type="checkbox" name="mtl_east">Montreal East
	<input type="checkbox" name="mtl_west">Montreal West
	<input type="checkbox" name="old_port">Old port
	</li>
	<br>
	<li>
	<label>Price Range/per night:</label><br>
	<select id = "price">
	<option value="50"><$50</option>
	<option value="100"><$100</option>
	<option value="200"><$200</option>
	<option value="audi">No price limit</option>
	</select>
	</li>
	<br>
	<li>
	<label>Number of Private Parkings</label><br>
	<input type="radio" name="privateParkings" value="0"> 0<br>
	<input type="radio" name="privateParkings" value="1"> 1<br>
	<input type="radio" name="privateParkings" value="2"> 2<br>
	<input type="radio" name="privateParkings" value="3"> 3<br>
	<input type="radio" name="privateParkings" value="4"> 4<br>
	</li>
	<br>
	<li>
	<label>Special Facilities</label><br>
	<input type="checkbox" name="facilities" value="minibar">Minibar
	<input type="checkbox" name="facilities" value="balcony">Balcony
	<input type="checkbox" name="facilities" value="pool">Pool
	<input type="checkbox" name="facilities" value="waterFront">Water Front
	<input type="checkbox" name="facilities" value="gardenFront">Gardern Front
	</li>
	</ul>
	</fieldset>

	<fieldset id="suggestions" class="hidden">
	<legend>Expert Suggestions</legend>
	<label><b>It is difficult to find a hotel room in this price rangeDowntown</b></label>
	</fieldset>

    <button type="submit" name="search">Search</button>
		<input type="reset" name="reset">

	<script type="text/javascript">
		function verifySearch() {
			let ft = document.getElementById("fifty").selected;
			let down= document.getElementById("downtown").checked;
			if(ft && down){
			document.getElementById("suggestions").className = "visible";
		}else document.getElementById("suggestions").className = "hidden";
		}

	</script>
   <p> </p>
</form>
<form action = "login.php" id = "button">
    <?php if(!empty($_SESSION['username'])) echo "Welcome, ". $_SESSION['username']."!";  ?>
    <button type="submit">Login</button>

</form>
</body>
<footer> <div id="footer"><a href="disc.html">Privacy/Disclaimer Statement</a></div></footer>
</html>
