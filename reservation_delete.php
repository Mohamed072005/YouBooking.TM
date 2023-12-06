<?php
@include 'cnxDB.php';
if (isset($_GET['deleteid'])) {
    $id=$_GET['deleteid'];
    $idinvoice=$_GET['idinoice'];
    $delinv="DELETE FROM `invoice`  WHERE invoice_id =$idinvoice";
    $result=mysqli_query($conn,$delinv);
    if ($result) {
        $delres="DELETE FROM `reservation` WHERE reservation_id =$id";
        $result=mysqli_query($conn,$delres);  
        header("location:reservation.php");
}}
?>