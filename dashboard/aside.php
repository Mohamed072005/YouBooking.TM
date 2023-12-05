<aside class="col-md-2 bg-dark text-light p-4 aside">
                
                <ul class="list-unstyled">
                    <?php   if( $_SESSION['role_id'] == 1  ){?>
                    <li><a href="#">dashboard</a></li>
                    <li><a href="utilisteur.php">users</a></li>
                    <li><a href="request.php">requests</a></li>
                    <li><a href="hotel.php">hotels</a></li>
                    <?php } if( $_SESSION['role_id'] == 2){?>
                    <li><a href="hotel.php">hotels</a></li>
                    <li><a href="romms.php">romms</a></li>
                    <li><a href="requestresponsable.php">request</a></li>
                    <?php } ?>
                </ul>
 </aside>