<?php
session_start();  // To initiate a session

   if (isset($_POST['username'])) {
       $_SESSION["username"] = $_POST['username'];
   }

   if(isset($_POST['reset']) == 'yes'){
       unset($_SESSION["username"]);
       unset($_SESSION["count"]);
       session_destroy();
   }
   //
if ( !isset( $_SESSION['count'] ) ){
   $_SESSION['count'] = 1;
    } else {
        $_SESSION['count']++;
}

?>


<html>
<head>
<title>Count Visits</title>
</head>

<body>
<?php if((!isset($_POST['username'])) || ($_SESSION['count'] < 4)) { ?>

   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
   What is Your Name ? <input type="text" name="username">
   <input type="submit" name="submit" value="Send">
   </form>

<?php } else { ?>
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
       <h3>Hello <?php echo( $_SESSION['username'] ); ?> !</h3>
       <p>You have visited this page <?php echo( $_SESSION['count'] ); ?> times.</p>
       <input type="hidden" name="reset" value="yes">
   <input type="submit" value="Reset">
   </form>
<?php } ?>


</body>
</html>
