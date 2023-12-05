<?php

$conn = mysqli_connect("localhost", "root", "", "youbooking");

if(isset($_GET['id']) && isset($_GET['id_location'])){
    $hotelID = $_GET['id'];
    $idLocation = $_GET['id_location'];
    $select = "SELECT * FROM hotel JOIN localisation ON hotel.location_id = localisation.location_id WHERE hotel_id = '$hotelID'";
    $result = mysqli_query($conn, $select);
    $user = mysqli_fetch_assoc($result);
}
include "../dashboard/header.php";
?>


    <main>
        <div class="container-fluid d-flex justify-content-center">
            <form class="row w-50 h-75 mt-5" method="post">
                <div class="col-12">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" value="<?= $user['name'] ?>" name="name" required>
                </div>
                <div class="col-12">
                    <label for="contactNumber" class="form-label">Contact Number:</label>
                    <input type="tel" class="form-control" id="contactNumber" value="<?= $user['contact_number'] ?>"
                        name="contactNumber" required>
                </div>
                <div class="col-12">
                    <label for="amenities" class="form-label">Amenities:</label>
                    <input type="text" class="form-control" id="amenities" value="<?= $user['amenities'] ?>" name="amenities"
                        required>
                </div>
                <div class="col-12">
                    <label for="pays" class="form-label">Pays:</label>
                    <input type="text" class="form-control" id="pays" value="<?= $user['pays'] ?>" name="pays" required>
                </div>
                <div class="col-12">
                    <label for="ville" class="form-label">Ville:</label>
                    <input type="text" class="form-control" id="ville" value="<?= $user['ville'] ?>" name="ville" required>
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <button type="submit" name="updatehotel" class="btn btn-primary">Update</button>
                </div>
                
            </form>
        </div>
        
    </main>
    

</html>



<?php
if(isset($_POST['updatehotel'])){
    $hotelname = $_POST['name'];
    $contactNumber = $_POST['contactNumber'];
    $amenities = $_POST['amenities'];
    $pay = $_POST['pays'];
    $ville = $_POST['ville'];
    $sql = mysqli_query($conn, "UPDATE localisation, hotel SET `pays` = '$pay', `ville` = '$ville', `name` = '$hotelname',
                        `contact_number` = '$contactNumber', `amenities` = '$amenities'
                        WHERE hotel.hotel_id = '$hotelID' AND localisation.location_id = '$idLocation'");
    if($sql){
        header("location: ../dashboard/hotel.php");
    }else {
        echo "Error updating hotel table: " . mysqli_error($conn);
        echo "<h1>or</h1>";
        echo "Error updating localisation table: " . mysqli_error($conn);
    }
    
}
?>