<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "coding";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    echo('Connection Failed.');
}
else

?>