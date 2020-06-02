<?php require APPROOT . '/views/inc/header.php'; ?>
<script>
  // Change the type of input to password or text 
  function Toggle() {
    var a = document.getElementById("1");
    var temp = document.getElementById("2");
    if (temp.type === "password") {
      temp.type = "text";
    } else {
      temp.type = "password";
    }

    if (a.type === "password") {
      a.type = "text";
    } else {
      a.type = "password";
    }
  }
</script>
<style>
  @import url(https://fonts.googleapis.com/css?family=Lato);

  /*------------------------------------------------*/
  /* default
/*------------------------------------------------*/
  html,
  body {
    font-size: 16px;
  }

  body {
    background-color: #f1f1f1;
    font-family: 'Lato', sans-serif;
    font-size: 1rem;
    -webkit-font-smoothing: antialiased;
    color: #222222;
  }

  .center_div {
    margin: 0 auto;
    width: 80%
      /* value of your choice which suits your alignment */
  }

  /*------------------------------------------------*/
  /* layout
/*------------------------------------------------*/
</style>
<div id="main">
  <div class="container mb-2">
    <?php echo "<a class='btn btn-light mt-2'  href=" . POSTS . "&id=" . $data['journalId']->JOURNAL_ID . " class='das' ><i class='fa fa-backward'></i>Back</a>"; ?>

    <h1><strong>Register</strong></h1>
    <div class="row justify-content-center">
      <div class="col-xl-6 col-sm-8 ">
        <div class="card mb-4 mt-4">
          <div class="card-block">
            <h2 class="card-header text-center">
              <strong>Please Cheage Password Here</strong>
            </h2>
            <div class="card-body">
              <div class="row justify-content-md-center">
                <div class="col-md-8">
                  <form class="mt-3" method="post">
                    <div class="form-group">
                      <label for="1"><strong>New Password </strong></label>
                      <input type="password" id="1" name="newPassword" class="form-control <?php echo (!empty($data['new_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['new_password']; ?>">
                      <span class="invalid-feedback"><?php echo $data['new_password_err']; ?></span>
                    </div>
                    <div class="form-group">
                      <label for="2"><strong>Confirm Password </strong></label>
                      <input type="password" id="2" name="password2" class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
                      <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                    </div>
                    <div class="rememberpass custom-control custom-checkbox mt-3">
                      <input type="checkbox" class="custom-control-input" id="customControlValidation1" onclick="Toggle()">
                      <label class="custom-control-label" for="customControlValidation1">Show Password</label>
                    </div>

                    <input type="submit" name="submit" class="btn btn-success btn-block mt-3" id="loginbtn" value="Log in">
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
<?php require APPROOT . '/views/inc/footer.php'; ?>