<?php
$conn = mysqli_connect("localhost", "root", "", "youbooking");

$error = "";

if(isset($_GET['id']) && isset($_GET['id_room_details'])){

    $idRoom = $_GET['id'];
    $idRoomDetail = $_GET['id_room_details'];

    $display = "SELECT *, room.amenities FROM room 
    JOIN typeroom ON room.roomtype_id = typeroom.roomtype_id
    JOIN hotel ON hotel.hotel_id = room.hotel_id
    JOIN room_details ON room_details.room_id = room.room_id WHERE room.room_id = '$idRoom'";
    $sql = mysqli_query($conn, $display);
    $row = mysqli_fetch_assoc($sql);
}
include "../dashboard/header.php";
?>
<main>
        <div class="container-fluid d-flex justify-content-center">
            <form class="row w-50 h-75 mt-5" method="post">
                <div class="col-12">
                    <label for="roomNumber" class="form-label">Room Number:</label>
                    <input type="text" class="form-control" id="roomNumber" value="<?= $row['room_number'] ?>" name="roomNumber" required>
                </div>
                <div class="col-12">
                    <label for="price" class="form-label">Price:</label>
                    <input type="text" class="form-control" id="price" value="<?= $row['price'] ?>" name="price" required>
                </div>
                <div class="col-12">
                    <label for="amenities" class="form-label">Amenities:</label>
                    <input type="text" class="form-control" id="amenities" value="<?= $row['amenities'] ?>" name="amenities"
                        required>
                </div>
                <div class="col-12">
                    <label for="roomType" class="form-label">Room Type:</label>
                    <select name="roomType" class="form-select" id="" required>
                    <?php
                    $select1 = "SELECT * FROM typeroom";
                    $query1 = mysqli_query($conn, $select1);
                    
                    while($row = mysqli_fetch_assoc($query1)){
                        echo "<option value = '{$row['roomtype_id']}' > {$row['room_type']} </option>";
                    }
                    ?>
                    </select>
                </div>
                <div class="col-12">
                    <label for="hotellName" class="form-label">Hotel Name:</label>
                    <select name="hotellName" class="form-select" id="hotellName" required>
                    <?php
                    $id = $_SESSION['user_id'];
                    $select2 = "SELECT * FROM hotel WHERE user_id = '$id'";
                    $query2 = mysqli_query($conn, $select2);

                    while($row = mysqli_fetch_assoc($query2)){
                        echo "<option value = '{$row['hotel_id']}' > {$row['name']} </option>";
                    }
                    ?>
                    </select>
                </div>
                
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <button type="submit" name="updateroom" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        
    </main>
</body>
</html>
<?php
if(isset($_POST['updateroom'])){
    $roomNumber = $_POST['roomNumber'];
    $price = $_POST['price'];
    $amenities = $_POST['amenities'];
    $roomType = $_POST['roomType'];
    $hotelName = $_POST['hotellName'];

    $updatesql = mysqli_query($conn, "UPDATE room, room_details SET room.hotel_id = '$hotelName', 
                                room.roomtype_id = '$roomType', room.price = '$price', room.amenities = '$amenities',
                                room_details.room_number = '$roomNumber' WHERE room.room_id = '$idRoom' 
                                AND room_details.room_detail_id = '$idRoomDetail'");
    if($updatesql){
        header("location: ../dashboard/romms.php");
    }else {
        echo "<h3>No result to Update</h3>";
    }
}
?>