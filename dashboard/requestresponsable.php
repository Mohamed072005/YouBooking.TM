<?php  
include 'header.php';
if(!isset($_SESSION['role_id']) ||  $_SESSION['role_id']!=2){
  header('location:../login.php');
}
?>
<div class="container-fluid">
    <div class="row">
        <?php include 'aside.php' ?>

        <main class="col-md-10 p-3 main-content">

            <section class="section dashboard">
            

                <table class="table align-middle mb-0 bg-white shadow ">
                    <thead class="bg-light">
                        <tr>
                            <th>Nom et Prenom</th>
                            <th>Email</th>
                            <th>request</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sql = "SELECT * FROM users  natural join request where request_id=3 ";
               $result = mysqli_query($conn, $sql);   
               if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                                        style="width: 45px; height: 45px" class="rounded-circle" />
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1"><?=$row['name']?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-bold mb-1"><?=$row['email']?></p>
                            </td>
                            <td>
                                <span class="badge btn btn-success"><?=$row['request']?></span>
                            </td>
                            <td>

                                <a type="button" href="../logique/accepterrequestresponsable.php?id=<?=$row['user_id']?>"
                                    class="btn btn-success">accepter</a>
                                <a type="button" href="../logique/refusérequestresponsable.php?id=<?=$row['user_id']?>"
                                    class="btn btn-danger">refuseé</a>
                            </td>
                        </tr> <?php }}?>
                    </tbody>
                </table>

            </section>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>