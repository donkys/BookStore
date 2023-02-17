<?php
define('SERVER','68.183.185.180');
define('USERNAME','Porapipat');
define('PASSOWRD','Porapipat159753654');
define('DATABASE','bookstore_db');

// define('SERVER','db-fullstackweb-do-user-13569510-0.b.db.ondigitalocean.com:25060');
// define('USERNAME','doadmin');
// define('PASSOWRD','AVNS_BYoB58Otxj76eebOr9f');
// define('DATABASE','bookstoredb');

function connect()
{
    $mysqli = new mysqli(SERVER, USERNAME, PASSOWRD, DATABASE);
    // mysqli_report(MYSQLI_REPORT_OFF);
    if ($mysqli->connect_errno != 0) {
        $error = $mysqli->connect_error;
        $error_date = date("F j, Y, g:i a");
        $message = "{$error} | {$error_date} \r\n";
        file_put_contents("db-log.txt", $message, FILE_APPEND);
        return false;
    } else {
        return $mysqli;
    }

}

?>

