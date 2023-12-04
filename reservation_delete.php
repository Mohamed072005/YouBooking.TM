<?php
@include 'cnxDB.php';
if (isset($_GET['deleteid'])) {
    $id=$_GET['deleteid'];
    $sql="DELETE FROM `reservation` WHERE reservation_id=$id";
    $result=mysqli_query($conn,$sql);
    if ($result) {
    header("location:reservation.php");
    } else {
        die(mysqli_error($conn));
    }
}
?>