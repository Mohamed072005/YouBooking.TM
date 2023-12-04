<?php  include 'header.php'; ?>

    <section class="container mt-5"  style="height:80vh">
        <h2 class="text-center mb-4">Reservations</h2>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Room number</th>
                    <th scope="col">Reservation start date</th>
                    <th scope="col">Reservation end date</th>
                    <th scope="col">price</th>
                    <th scope="col">type</th>
                    <th scope="col">status</th>
                </tr>
            </thead>
            <tbody>
            <?php
        $sql = "SELECT
        room_details.room_number,
        reservation.start_date,
        reservation.end_date,
        reservation.total_cost,
        typeroom.room_type,
        invoice.status
    FROM
    reservation
    JOIN room_details on reservation.room_detail_id=room_details.room_detail_id
    JOIN room ON room_details.room_id = room.room_id 
    JOIN typeroom on room.roomtype_id=typeroom.roomtype_id
    JOIN invoice ON reservation.reservation_id = invoice.reservation_id
    where user_id;";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
                $room_number=$row['room_number'];
                $start_date=$row['start_date'];
                $end_date= $row['end_date'];
                    $price= $row['total_cost'];
                    $type= $row['room_type'];
                    $status= $row['status'];
                    echo' <tr>
                    <th scope="row">'.$room_number.'</th>
                    <td>'.$start_date.'</td>
                    <td>'.$end_date.'</td>
                    <td>'.$price.'</td>
                    <td>'.$type.'</td>
                    <td>'.$status.'</td>
                    <td>
                    <button id="delete"><a href="#">Annuler</a></button>
                    </td>
                </tr>';
        }
        } else {
        echo "0 results";
        }

        mysqli_close($conn);


?>
            </tbody>
        </table>
    </section>

    <footer class="bg-light text-center p-3">
        <p>&copy; 2023 Hotel Youbooking. All Rights Reserved.</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>