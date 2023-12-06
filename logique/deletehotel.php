<?php
include '../cnxDB.php';

if(isset($_GET['id']) && isset($_GET['id_location'])){
    $location_id = $_GET['id_location'];
    $hotelId = $_GET['id'];

    $deletHotel = "DELETE FROM hotel WHERE hotel.hotel_id = '$hotelId'";
    $sqlHotel = mysqli_query($conn, $deletHotel);

    $deletLocation = "DELETE FROM localisation WHERE localisation.location_id = '$location_id'";
    $sqlLocation = mysqli_query($conn, $deletLocation);

    if($sqlHotel && $sqlLocation){
        header("location: ../dashboard/hotel.php");
    }else {
        echo "<h1>Hello, World</h1>" . mysqli_error($conn);
    }
}
?>