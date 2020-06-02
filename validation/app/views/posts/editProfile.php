<?php require APPROOT . '/views/inc/header.php'; ?>

<div id="main">
  <div class="container">
    <?php echo "<a class='btn btn-light mt-2'  href=" . POSTS . "&id=" . $data['journalId']->JOURNAL_ID . " class='das' ><i class='fa fa-backward'></i>Back</a>"; ?>
    <div id="contents">
      <h1><strong>Register</strong></h1>
      <form method="post" class="mb-2">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="fname"> <strong>First name</strong></label>
            <input type="text" name="fname" id="fname" class="form-control  <?php echo (!empty($data['fname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['fname']; ?>">
            <span class="invalid-feedback"><?php echo $data['fname_err']; ?></span>
          </div>
          <div class="form-group col-md-6">
            <label for="lname"><strong> Last name</strong></label>
            <input type="text" name="lname" id="lname" class="form-control  <?php echo (!empty($data['lname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lname']; ?>">
            <span class="invalid-feedback"><?php echo $data['lname_err']; ?></span>
          </div>
        </div>

        <div class="form-row">
          <div class=" form-group col-md-6 mb-2">
            <label for="colFormLabel"><strong>Email</strong></label>
            <input type="text" id="colFormLabel" name="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>


          <div class="form-group col-md-6 mb-2">
            <label for="title"><strong> Title</strong></label>
            <input type="text" id="title" name="title" class="form-control  <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
            <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6 mb-2">
            <label for="city"><strong>City</strong> </label>
            <input type="text" id="city" name="city" class="form-control <?php echo (!empty($data['city_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['city']; ?>">
            <span class="invalid-feedback"><?php echo $data['city_err']; ?></span>
          </div>
          <div class="form-group col-md-4 mb-2">
            <label for="state"><strong>State</strong></label>
            <input type="text" id="state" name="state" class="form-control  <?php echo (!empty($data['state_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['state']; ?>">
            <span class="invalid-feedback"><?php echo $data['state_err']; ?></span>
          </div>
          <div class="form-group col-md-2 mb-2">
            <label for="country"><strong>country</strong> </label>
            <input type="text" id="country" name="country" class="form-control  <?php echo (!empty($data['country_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['country']; ?>">
            <span class="invalid-feedback"><?php echo $data['country_err']; ?></span>
          </div>
        </div>
        <div class="form-row">
          <legend class="col-form-label col-md-2 mb-2" for="input"><strong>Gender</strong> </legend>

          <div class="form-group col-md-2 ">
            <div class="form-check">
              <input type="radio" id="gridRadios1" name="gender" class="form-check-input <?php echo (!empty($data['gender_err'])) ? 'is-invalid' : ''; ?>" value='MALE' <?php echo ($data['gender'] == 'MALE') ? 'checked' : ''; ?>>
              <label class="form-check-label mr-4" for="gridRadios1">
                Male
              </label>

              <input type="radio" name="gender" id="gridRadios2" class="form-check-input   <?php echo (!empty($data['gender_err'])) ? 'is-invalid' : ''; ?>" value='FEMALE' <?php echo ($data['gender'] != 'FEMALE') ? '' : 'checked'; ?>>
              <label class="form-check-label" for="gridRadios2">Female
              </label>
            </div>
            <span class="invalid-feedback"><?php echo $data['gender_err']; ?></span>
          </div>
          <div class="form-group col-md-3 mb-2">
            <label for="designation"><strong>Designation</strong> </label>
            <select name="designation" id="dbType" class="form-control  <?php echo (!empty($data['designation_err'])) ? 'is-invalid' : ''; ?>">
              <option value="<?php echo $data['designation']; ?>"><?php echo $data['designation']; ?></option>
              <option value="Mr">Mr</option>
              <option value="Miss">Miss</option>
              <option value="Dr">Dr</option>
              <option value="Prof">Prof</option>
              <option value="others">others</option>
            </select><span class="invalid-feedback"><?php echo $data['designation_err']; ?></span>
          </div>
          <div class="col-md-2 mb-2">
            <label for="Text2"><strong>Mobile Number:</strong> </label>
            <input type="text" name="phone" id="Text2" class="form-control <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['phone']; ?>">
            <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
          </div>
          <div class="col-md-2 mb-2">
            <label for="institude"><strong>Instittude:</strong> </label>
            <input type="text" id="institute" name="institute" class="form-control <?php echo (!empty($data['institute_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['institute']; ?>">
            <span class="invalid-feedback"><?php echo $data['institute_err']; ?></span>
          </div>
        </div>

        <button type="submit" class="btn btn-success m1" name="submit">Submit</button>
      </form>
    </div>
  </div>

  <script type="text/javascript">
    function CheckColors(val) {
      var element = document.getElementById('color');
      if (val == 'pick a color' || val == 'others')
        element.style.display = 'block';
      else
        element.style.display = 'none';
    }
  </script>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>