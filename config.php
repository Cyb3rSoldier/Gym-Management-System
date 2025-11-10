<?php

$host = "sql305.infinityfree.com";  /* localhost */
$user = "if0_40168992";  /* root */
$password = "Ofr243274ok";  /**/
$database = "if0_40168992_gym_management_system";  /* gym-management-system */

$conn = new mysqli($host, $user, $password, $database);

if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}

?>