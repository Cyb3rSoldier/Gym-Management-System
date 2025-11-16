<?php

$host = "localhost";  /*  sql305.infinityfree.com */
$user = "root";  /* if0_40168992 */
$password = "";  /* Ofr243274ok */
$database = "gym-management-system";  /* if0_40168992_gym_management_system */

$conn = new mysqli($host, $user, $password, $database);

if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}

?>