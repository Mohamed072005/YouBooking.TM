<?php  include 'header.php';
 if ($_SESSION['role_id'] != 3) {
    header('location:login.php');
}
?>

<section>
    <div class="container p-0">
        <div class="hero-image" style="background-image:url(img/hero.jpg); height:70vh;">
           
            <div class="hero-text  text-white"style="padding:100px 0 0 100px;">
                <h1>Welcome to Our Hotel</h1>
                <p>Your perfect getaway destination</p>
                <a href="#" class="btn btn-primary btn-lg">Book Now</a>
            </div>
        </div>
    </div>
    </section>

<section>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Featured Rooms</h2>
        <div class="row">
          
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="img/rom1.jpg" class="card-img-top img-fluid" alt="Room 1">
                    <div class="card-body">
                        <h5 class="card-title">Deluxe Room</h5>
                        <p class="card-text">Spacious and luxurious room with a view.</p>
                        <a href="#" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            </div>
         
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="img/rom1.jpg" class="card-img-top img-fluid" alt="Room 2">
                    <div class="card-body">
                        <h5 class="card-title">Standard Room</h5>
                        <p class="card-text">Comfortable room for a relaxing stay.</p>
                        <a href="#" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="img/rom1.jpg" class="card-img-top img-fluid" alt="Room 2">
                    <div class="card-body">
                        <h5 class="card-title">Standard Room</h5>
                        <p class="card-text">Comfortable room for a relaxing stay.</p>
                        <a href="#" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            </div>
          
        </div>
    </div>

</section>


<section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">What Our Guests Say</h2>
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner  conatiner-sm">
                    <div class="carousel-item active">
                        <p class="lead">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam efficitur purus
                            quis felis vestibulum, ac ultricies odio condimentum. Ut bibendum turpis vel libero
                            venenatis, et ultricies odio condimentum."</p>
                        <h5 class="font-weight-bold">John Doe</h5>
                    </div>
                    <div class="carousel-item">
                    <p class="lead">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam efficitur purus
                            quis felis vestibulum, ac ultricies odio condimentum. Ut bibendum turpis vel libero
                            venenatis, et ultricies odio condimentum."</p>
                        <h5 class="font-weight-bold">John Doe</h5>
                    </div>
                    
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>


    <footer class="bg-light text-center p-3">
        <p>&copy; 2023 Hotel Youbooking. All Rights Reserved.</p>
    </footer>

   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
