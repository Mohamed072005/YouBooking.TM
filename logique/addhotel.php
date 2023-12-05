<?php 
    include '../cnxDB.php';


    if(isset($_POST['inserthotel'])){
        $hotelname = $_POST['name'];
        $contactNumber = $_POST['contactNumber'];
        $amenities = $_POST['amenities'];
        $pay = $_POST['pays'];
        $ville = $_POST['ville'];
        $userId = $_SESSION['user_id'];
        $insert = "INSERT INTO localisation (pays, ville) VALUE ('$pay', '$ville')";
        $sql = mysqli_query($conn, $insert);
        if($sql){
            $locationId = mysqli_insert_id($conn);
            $sqlHotel = mysqli_query($conn, "INSERT INTO hotel (`location_id`, `name`, `contact_number`, `amenities`, `user_id`)
            VALUES ('$locationId', '$hotelname', '$contactNumber', '$amenities', '$userId')");

            if ($sqlHotel) {
                header('location:../dashboard/hotel.php');
            }
        } else {
            echo "Error inserting into hotel table: " . mysqli_error($conn);
            echo "<h1>or</h1>";
            echo "Error inserting into localisation table: " . mysqli_error($conn);
        }
    }
    ?>


