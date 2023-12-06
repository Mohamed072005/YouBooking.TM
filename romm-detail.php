<?php include 'header.php'; 
 $roomId = $_GET['room_id'];



 
if (isset($_POST['checkAv'])) {
    $room_id =  $_GET['room_id'];
    $startdate = $_POST["startDate"];
    $enddate = $_POST["endDate"];

    if (strtotime($startdate) > strtotime($enddate)) {
        echo "End date should be after start date.";
        exit;
    }

    $sql = "SELECT * FROM reservation 
                           WHERE room_detail_id = $room_id
                           AND (('$startdate' BETWEEN start_date AND end_date) OR ('$enddate' BETWEEN start_date AND end_date))";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        if (mysqli_num_rows($res) < 1) {
            echo "<script>
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-start',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: 'success',
                        title: 'room is avilable in this date'
                    });
             </script>";
        } else {
            echo "<script>
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-start',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: 'warning',
                            title: 'sorry, rom not avilable'
                        });
             </script>";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}



if (isset($_POST['book'])) {

    if (!isset($_SESSION['user_id'])) {
        header('location:login.php');
    }

    $user_id = $_SESSION['user_id'];

    $room_id =  $_POST['room_id'];
    $start_date = $_POST["startDate"];
    $end_date = $_POST["endDate"];
    $prix = $_POST['price'];

    if (strtotime($start_date) > strtotime($end_date)) {
        echo "Error: End date should be after start date.";
        exit;
    }

    $start = new DateTime($start_date);
    $end = new DateTime($end_date);
    $interval = $start->diff($end);
    $totaljour = $interval->format('%a');
    $total_prix = $prix * $totaljour;


    $sql1 = "SELECT * FROM reservation 
    WHERE room_detail_id = $room_id
    AND (('$start_date' BETWEEN start_date AND end_date) OR ('$end_date' BETWEEN start_date AND end_date))";

    $res1 = mysqli_query($conn, $sql1);

    if ($res1 && mysqli_num_rows($res1) === 0) {
        $sql2 = "INSERT INTO reservation (user_id, start_date, end_date, total_cost, room_detail_id)
              VALUES ($user_id, '$start_date', '$end_date', '$total_prix', $room_id)";

        $res2 = mysqli_query($conn, $sql2);

        if ($res2) {
            $sql3 = "INSERT INTO invoice (reservation_id, issue_date, amount_due, status)
            VALUES (LAST_INSERT_ID(), CURDATE(), '$total_prix', 'Unpaid')";

            $res3 = mysqli_query($conn, $sql3);

            if ($res3) {
                echo "<script>
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-start',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: 'success',
                            title: 'Reservation  creation successful!'
                        });
                    </script>";
            } else {
                echo "Error creating invoice: " . mysqli_error($conn);
            }
        } else {
            echo "Error creating reservation: " . mysqli_error($conn);
        }
    } else {
        echo "<script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-start',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: 'warning',
                    title: 'Sorry, room not available for selected dates.'
                });
             </script>";
    }
}
?>

<div class="container">
    <div class="row">

        <div class="col-md-3">
            <div style="position: sticky; top:70px;">
                <div style="height:70px"></div>
                <h4>Check Availability</h4>

                <form class="mb-3" method="post" action="">
                    <input type="hidden" name="room_id" value="<?php echo $roomId; ?>">
                    <div class="mb-3">
                        <label for="startDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" name="startDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="endDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" name="endDate" required>
                    </div>
                    <button type="submit" name="checkAv" class="btn btn-primary">Check Availability</button>
                </form>
            </div>
        </div>

        <div class="col-md-9">
            <h2 class="text-center mb-4">Room Details</h2>

            <?php
            $sql = "SELECT room_details.room_number, typeroom.room_type, room.price, room.amenities, hotel.name
                    FROM room_details
                    INNER JOIN room ON room_details.room_id = room.room_id
                    INNER JOIN hotel ON room.hotel_id = hotel.hotel_id
                    INNER JOIN typeroom ON room.roomtype_id = typeroom.roomtype_id
                    WHERE room_details.room_detail_id = $roomId";

            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
            ?>
            <div class="row">

                <div class="col-md-12 ">
                    <div class="card ">

                        <div class="card-body d-flex gap-4">
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img src="img/rom1.jpg" class="card-img " alt="Room 1">
                                </div>
                            </div>
                            <div>
                                <h5 class="card-title"><?= $row["room_type"] ?> : <?= $row["room_number"] ?></h5>
                                <p class="card-text"><?= $row["amenities"] ?></p>
                                <p class="card-text"><?= $row["name"] ?></p>
                                <p class="card-text"><?= $row["price"] ?> $</p>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Book Now</a>
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="">
                                                    <div style="position: sticky;">

                                                        <h4>periode</h4>

                                                        <form class="mb-3" method="post" >
                                                            <input type="hidden" name="room_id"  value="<?= $roomId; ?>">
                                                            <input type="hidden" name="price" value="<?= $row["price"] ?>" >
                                                            <div class="mb-3">
                                                                <label for="startDate" class="form-label">Start
                                                                    Date</label>
                                                                <input type="date" class="form-control" name="startDate"
                                                                    required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="endDate" class="form-label">End Date</label>
                                                                <input type="date" class="form-control" name="endDate"
                                                                    required>
                                                            </div>
                                                            <button type="submit" name="book"
                                                                class="btn btn-primary">book</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            } else {
                echo "<p>No room details found.</p>";
            }
            ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>

<?php



?>