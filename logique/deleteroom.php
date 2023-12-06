<?php
include "../cnxDB.php";

if(isset($_GET['id'])){
    $idRoom = $_GET['id'];
    $delete = "DELETE FROM room WHERE room_id = '$idRoom'";
    $sql = mysqli_query($conn, $delete);
    if($sql){
        header("location: ../dashboard/romms.php");
    }else {
        echo "<h3 style = 'color: red;'>No Result</h3>";
    }
}
?>