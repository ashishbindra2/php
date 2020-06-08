<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo STYLE . '/login.css'; ?>">
<div id="main">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5 mb-4">
          <?php flash('register_success'); ?>
          <h2>Author Login</h2>
          <form method="post">
            <div class="imgcontainer">
              <img src="<?php echo IMG . '/logo_icon-min.png' ?>" alt="Avatar" class="avatar featurette-image img-fluid mx-auto">
            </div>
            <p class="text-center">Please fill in your credentials to log in</p>
            <div class="form-group">
              <label for="email"><strong>Email:</strong> <sup>*</sup></label>
              <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
              <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
            </div>
            <div class="form-group">
              <label for="password"><strong>Password:</strong> <sup>*</sup></label>
              <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
              <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
            </div>
            <div class="row">
              <div class="col">
                <input type="submit" value="Login" class="buttonL">
              </div>
              <div class="col">
                <input type="button" class="cancelbtn" value="No account? Register" id="Signup">
              </div>
            </div>
            <div class="row">
              <div class="rememberpass col custom-control custom-checkbox ml-3">
                <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                <label class="custom-control-label" for="remember">Remember me</label>
              </div>
              <!-- <div class="col">
                <input type="checkbox" class="form-check-input ml-1" id="remember" name="remember">
                <label class="form-check-label ml-2" for="remember"> Remember me</label>
              </div> -->
              <div class="col">

                <a href='<?php echo URLROOT . "users/frogetPass&id=" . $data['journalId']->JOURNAL_ID; ?>' class="btn btn-light btn-block">Forgot Password</a>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
<script>
  var btn = document.getElementById('Signup');
  btn.addEventListener('click', function() {
    document.location.href = '<?php echo URLROOT . "users/register&id=" . $data['journalId']->JOURNAL_ID; ?>';
  });
</script>
<?php

if (isset($_COOKIE['email']) and isset($_COOKIE['pass'])) {
  # code...
  $email = $_COOKIE['email'];
  $pass = $_COOKIE['password'];
  echo "<script>
          document.getElementById('email').value = '".$email."';
          document.getElementById('password').value = '$pass';
          </script>";
}

?>
<?php require APPROOT . '/views/inc/footer.php'; ?>