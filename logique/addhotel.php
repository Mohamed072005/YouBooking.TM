<?php
include '../cnxDB.php';

if(isset($_POST['inserthotel'])){
    $hotelName = $_POST["name"];
    $contactNumber = $_POST["contactNumber"];
    $amenities = $_POST["amenities"];
    $pays = $_POST["pays"];
    $ville = $_POST["ville"];
  
    $insertlocal = "INSERT INTO localisation (pays, ville) VALUES ('$pays', '$ville')";
    $result = mysqli_query($conn, $insertlocal);

    if ($result) {
        $locationId = mysqli_insert_id($conn);
    $id=$_SESSION['user_id'];
        $inserthotel = "INSERT INTO hotel (`hotel_id`, `location_id`, `name`, `contact_number`, `amenities`, `user_id`) VALUES ( null , $locationId, '$hotelName', '$contactNumber', '$amenities','$id')";
        $resultHotel = mysqli_query($conn, $inserthotel);

        if ($resultHotel) {
           header('location:../dashboard/hotel.php');
        }
    } 
}

?>


