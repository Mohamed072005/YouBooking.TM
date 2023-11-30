<?php include 'cnxDB.php' ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Home Page</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body>
    <section class=" container mt-5 col-md-5">
    <div class="card mb-3">

<div class="card-body">

  <div class="pt-4 pb-2">
    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
    <p class="text-center small">Enter your username & password to login</p>
  </div>

  <form class="row g-3 needs-validation"  action="logique/loginuser.php" method="post">

  <div class="col-12">
      <label for="yourEmail" class="form-label">Your Email</label>
      <input type="email" name="email" class="form-control" id="yourEmail" required>
      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
    </div>

    <div class="col-12">
      <label for="yourPassword" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="yourPassword" required>
      <div class="invalid-feedback">Please enter your password!</div>
    </div>

    <div class="col-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
        <label class="form-check-label" for="rememberMe">Remember me</label>
      </div>
    </div>
    <div class="col-12">
      <input class="btn btn-primary w-100" type="submit" value="login"  name="login">
    </div>
    <div class="col-12">
      <p class="small mb-0">Don't have account? <a href="register.php">Create an account</a></p>
    </div>
  </form>

</div>
</div>
    </section>
</body>