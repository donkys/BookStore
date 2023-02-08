<?php
$username = "Porapipat";
$password = "Porapipat159753654";
$hostname = "localhost";
$dbname = "bookstoredb";

//connection to database name with session
$connection = mysqli_connect($hostname,$username,$password);
//used big $_SESSIOn
$link = mysqli_select_db($connection, $dbname);
// echo "$link";


