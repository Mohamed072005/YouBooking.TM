<?php

include '../connexion.php';


if (isset($_GET['id'])) {
    $user_id =  $_GET['id'];
    $sql = "UPDATE `users` SET `request_id`=2  where user_id=$user_id";
    
    if (mysqli_query($conn, $sql)) {
       header('location:../dashboard/request.php');
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    echo "User ID not specified.";
}


?>