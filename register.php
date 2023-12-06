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
    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
    <p class="text-center small">Enter your personal details to create account</p>
  </div>

  <form class="row g-3 needs-validation"  action="logique/insertRegister.php" method="post">
    <div class="col-12">
      <label for="yourName" class="form-label">Your Name</label>
      <input type="text" name="name" class="form-control" id="yourName" required>
      <div class="invalid-feedback">Please, enter your name!</div>
    </div>

    <div class="col-12">
      <label for="yourEmail" class="form-label">Your Email</label>
      <input type="email" name="email" class="form-control" id="yourEmail" required>
      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
    </div>

    <div class="col-12">
      <label for="phone" class="form-label">Phone</label>
      <input type="text" name="phone" class="form-control" id="phone" required>
      <div class="invalid-feedback">Please enter a valid phone number!</div>
    </div>

    <div class="col-12">
      <label for="yourPassword" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="yourPassword" required>
      <div class="invalid-feedback">Please enter your password!</div>
    </div>
    <div class="col-12">
          <label for="yourPassword" class="form-label">type</label>
        <select name="type" class="form-control" id="">
                  <?php  $sql="SELECT `request_id`, `request` FROM `request` where request!='responsable' and request!='virifiedproprietaire' and request!='virfiedresponsable'";
                        $res=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_assoc($res)){?>
                        <option value="<?=$row['request_id']?>"><?=$row['request']?></option>
                      
                <?php }?>
        </select>
    </div>

   
    <div class="col-12">
      <input  class="btn btn-primary w-100" name="insert" type="submit"   value="Creat">
    </div>
    <div class="col-12">
      <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
    </div>
  </form>

</div>
</div>
    </section>
</body>