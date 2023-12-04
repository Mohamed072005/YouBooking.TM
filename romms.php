
<?php  include 'header.php';
    if (isset($_POST['filter'])) {
        $hotel_Name=$_POST['hotel_name'];
        $city=$_POST['hotel_city'];

        $sql="SELECT room_details.room_number, typeroom.room_type, room.price, room.amenities, hotel.name
        FROM room_details
        INNER JOIN room ON room_details.room_id = room.room_id
        INNER JOIN hotel ON room.hotel_id = hotel.hotel_id
        INNER JOIN typeroom ON room.roomtype_id = typeroom.roomtype_id
        INNER JOIN localisation ON hotel.location_id = localisation.location_id
        WHERE hotel.name = '$hotel_Name' AND localisation.ville = '$city' ";
    $result = mysqli_query($conn,$sql);
}
?>


    <div class="container">
        <div class="row">
            <div class="col-md-3" id="filter"
                style="position: sticky; top:70px; box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.1);">
                <div style="height:70px"></div>
                <h4>Filter Options</h4>
                <form method="POST">
                    <div class="mb-3">
                        <label for="hotelName" class="form-label">Hotel Name</label>
                        <input type="text" name="hotel_name" class="form-control" id="hotelName" placeholder="Enter hotel name">
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="hotel_city" class="form-control" id="city" placeholder="Enter city">
                    </div>
                    <button type="submit" name="filter" class="btn btn-primary">Filter</button>
                </form>
            </div>

            
            <div class="col-md-9" id="roomList">
                <h2 class="text-center mb-4">Available Rooms</h2>
                <div class="row">
             <?php  
             
             if (isset($_POST['filter'])) {
                $hotel_Name=$_POST['hotel_name'];
                $city=$_POST['hotel_city'];
        
                $sql="SELECT room_details.room_detail_id, room_details.room_number, typeroom.room_type, room.price, room.amenities, hotel.name
                FROM room_details
                INNER JOIN room ON room_details.room_id = room.room_id
                INNER JOIN hotel ON room.hotel_id = hotel.hotel_id
                INNER JOIN typeroom ON room.roomtype_id = typeroom.roomtype_id
                INNER JOIN localisation ON hotel.location_id = localisation.location_id
                WHERE hotel.name = '$hotel_Name' AND localisation.ville = '$city' ";
            $result = mysqli_query($conn,$sql);

                
                
                
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="img/rom1.jpg" class="card-img-top img-fluid" alt="Room 1">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row['room_number']?></h5>
                                <p class="card-text"><?=$row['room_type']?></p>
                                <a href="romm-detail.php?room_id=<?=$row['room_detail_id']?>" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <?php }  } else{ ?>
                  
                   <?php    $sql="SELECT room_details.room_detail_id, room_details.room_number, typeroom.room_type, room.price, room.amenities, hotel.name
                FROM room_details
                INNER JOIN room ON room_details.room_id = room.room_id
                INNER JOIN hotel ON room.hotel_id = hotel.hotel_id
                INNER JOIN typeroom ON room.roomtype_id = typeroom.roomtype_id
                INNER JOIN localisation ON hotel.location_id = localisation.location_id";
            $result = mysqli_query($conn,$sql);

                
                
                
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="img/rom1.jpg" class="card-img-top img-fluid" alt="Room 1">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row['room_number']?></h5>
                                <p class="card-text"><?=$row['room_type']?></p>
                                <a href="romm-detail.php?room_id=<?=$row['room_detail_id']?>" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <?php } }  ?>
                    
                  
                
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>