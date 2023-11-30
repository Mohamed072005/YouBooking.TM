<?php
include '../cnxDB.php';

if(isset($_POST['insert'])){
   
   $name=$_POST['name'];
   $email=$_POST['email'];
   $phone=$_POST['phone'];
   $roll=$_POST['type'];
   $password= password_hash($_POST['password'], PASSWORD_DEFAULT);
  
   $sqll="INSERT INTO `users`(`user_id`, `role_id`,`request_id`, `name`, `email`, `pass_word`, `phone_number`) VALUES (null,3,$roll,'$name','$email','$password','$phone')";

   if (mysqli_query($conn, $sqll)) {
    header('location:../login.php');
} else {
    echo "Error: " . $sqll . "<br>" . mysqli_error($conn);
}
}

?>