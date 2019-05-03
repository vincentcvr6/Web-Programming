<?php
$rege1 = "/^[A-Za-z]{0,30}$/";
$rege2 = "/^\(\d{3}\)-\d{3}-\d{4}$/";

$name = $_POST["name"];
$nbr = $_POST["nbr"];

echo "Hi " . $name . "! <br>";

if(preg_match($rege1, $name) && preg_match($rege2, $nbr)) {
    print "The number and name were entered correctly";
} else {
    print  "The number and name were not entered correctly";
}
?>
