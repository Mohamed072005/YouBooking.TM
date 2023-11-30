<?php
session_start();

include '../cnxDB.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ( password_verify($password, $row['pass_word'])) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['role_id'] = $row['role_id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['phone'] = $row['phone_number'];
            if ($_SESSION['role_id'] == 3) {
                header('location:../index.php');
            } else if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2 || $_SESSION['role_id'] == 4){
                header('location:../dashboard/index.php');
            } else{
                header('location:register.php');
            }
        } else {
            echo "Invalid email or password";
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


?>