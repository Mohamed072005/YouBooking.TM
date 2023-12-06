<?php

include "../cnxDB.php";

if(isset($_POST['insertroom'])){
    $roomNumber = $_POST['roomNumber'];
    $roomPrice = $_POST['roomPrice'];
    $amenities = $_POST['amenities'];

    $idRoomType = $_POST['roomType'];
    $idHotelName = $_POST['hotelName'];

    $insert1 = "INSERT INTO room (`hotel_id`, `roomtype_id`, `price`, `amenities`) VALUE ('$idHotelName', '$idRoomType', '$roomPrice', '$amenities')";
    $sql = mysqli_query($conn, $insert1);
    if($sql){
        $lastRoomId = mysqli_insert_id($conn);
        echo $lastRoomId;
        echo $roomNumber;
        $insert2 = "INSERT INTO room_details (`room_id`, `room_number`) VALUE ('$lastRoomId', '$roomNumber')";
        $sql2 = mysqli_query($conn, $insert2);
        if($sql2){
            header("location: ../dashboard/romms.php");
        }else {
            echo "warning!!";
        }
    }else {
        echo "No result";
    }
    




}

?>