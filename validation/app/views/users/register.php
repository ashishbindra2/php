<?php require APPROOT . '/views/inc/header.php'; ?>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<div id="main">
  <div class="container">
    <h1 style=" font-family:Georgia, 'Times New Roman', Times, serif;" class="pt-3">
      <strong>Register</strong></h1>

    <div class="row mb-4">
      <div class="col-md-10 mx-auto">
        <div class="card smt-3">
           <div class="card-block card-header bg-dark text-white">
          <h2 class="text-center">Create An Account</h2>
          <p class="text-center mb-1">Please fill out this form to register with us</p>
</div>
          <form  method="post" class="card-body bg-light">
            <div class="form-row">
              <div class="form-group col-md-4">
                
                <label for="name">First Name: <sup>*</sup></label>
            <div class="input-group">    <input type="text" id="fname" name="name" class="form-control  <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
                <span class="invalid-feedback"><?php echo $data['name_err']; ?></span></div>
              </div>
              <div class="form-group col-md-4">
                <label for="mname"> Middle Name</label>
                <input type="text" name="mname" class="form-control <?php echo (!empty($data['mname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['mname']; ?>" id="mname">
                <span class="invalid-feedback"><?php echo $data['mname_err']; ?></span>
              </div>
              <div class="form-group col-md-4">
                <label for="lname">Last Name <sup>*</sup></label>
                <input type="text" class="form-control  <?php echo (!empty($data['lname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lname']; ?>" name="lname" id="lname">
                <span class="invalid-feedback"><?php echo $data['lname_err']; ?></span>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6 ">
                <label for="email">Email: <sup>*</sup></label>
                <input type="email" name="email" id="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
              </div>
              <div class="form-group col-md-6 mb-2">
                <label for="title">Title <sup>*</sup></label>
                <input type="text" class="form-control <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>" id="title" name="title">
                <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="password">Password: <sup>*</sup></label>
                <input type="password" id="pass" name="password" class="form-control  <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>"  autocomplete="off">
                <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
              </div>
              <div class="form-group col-md-6">
                <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                <input type="password" id="c_pass" name="confirm_password" class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>"  autocomplete="off">
                <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
              </div>
            </div>
            <div class="form-row">
<div class="form-group col-md-4 mb-2">
               <label>Select Country</label><span class="error">
                      * <?php echo $data['country_err']; ?></span>
                    <select name="country" id="country" class="form-control  <?php echo (!empty($data['country_err'])) ? 'is-invalid' : ''; ?>">
                      <option value="">Select Country</option>
                      <?php
                      if (isset($data['country'])) {
                        foreach ($data['country'] as $key) {
                          echo '<option value="' . $key->country_id . '">' . $key->country_name . '</option>';
                        }
                      } else {
                        echo '<option value="">Country not available</option>';
                      }
                      ?>
                    </select>
                        <span class="invalid-feedback"><?php echo $data['country_err']; ?></span>
                  </div>
              <div class="form-group col-md-4 mb-2">
                  <label>Select state</label><span class="error">
                      * <?php echo $data['state_err']; ?></span>
                    <select name="state" id="state" class="form-control  <?php echo (!empty($data['state_err'])) ? 'is-invalid' : ''; ?>" value="<?php //echo $data['state']; ?>">
                      <option value="1">Select country first</option>
                    </select>
        
                <span class="invalid-feedback"><?php echo $data['state_err']; ?></span>
              </div>
              <div class="form-group col-md-4 mb-2">
                   <label>Select City</label><span class="error">
                      * <?php echo $data['city_err']; ?></span>
                    <select name="city" id="city" class="form-control  <?php echo (!empty($data['city_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['city']; ?>">
                      <option value="1">Select state first</option>
                    </select>
            
                <span class="invalid-feedback"><?php echo $data['city_err']; ?></span>
              </div>
           
            </div>

            <div class="form-row">
              <legend class="col-form-label col-md-2 mb-2">Gender <sup>*</sup></legend>
              <div class="form-group col-md-2 ml-2">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="MALE" checked>
                  <label class="form-check-label" for="gridRadios1">  Male      </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="FEMALE">
                  <label class="form-check-label" for="gridRadios2">Female       </label>
                </div>
             
              </div>
              <div class="col-md-4 mb-2 ">
                <label for="designation">Designation <sup>*</sup> </label>
                <select class="form-control  <?php echo (!empty($data['designation_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['designation']; ?>" name=" designation" id="designation" onchange='CheckColors(this.value);'>
                  <option value="Mr">Mr</option>
                  <option value="Miss">Miss</option>
                  <option value="Dr">Dr</option>
                  <option value="Prof">Prof</option>
                  <option value="others">others</option>
                </select><span class=" invalid-feedback"><?php echo $data['designation_err']; ?></span>
              </div>

            </div>
            <div class="form-row">
              <div class="form-group col-md-6 mb-2">
                <label for="phone">Mobile Number <sup>*</sup> </label>
                <input type="text" name="phone" class="form-control <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['phone']; ?>" id="phone">
                <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
              </div>



              <div class="col-md-6 mb-2">
                <label for="institute">Institute Name: <sup>*</sup></label>
                <input type="text" name="institute" class="form-control  <?php echo (!empty($data['institute_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['institute']; ?>" id="institute">
                <span class="invalid-feedback"><?php echo $data['institute_err']; ?></span>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <input type="submit" value="Register" class="btn btn-success btn-block">
              </div>
              <div class="col">
                <a href="<?php echo URLROOT . 'users/login?id=' . $data['journalId']->JOURNAL_ID; ?>" class="btn btn-light btn-block">Have an account? Login</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src=" <?php echo VENDER; ?>/jquery/jquery-3.5.1.min.js ?>"></script>
<script src=" <?php echo VENDER; ?>/jquery/jquery-3.5.1.slim.min.js ?>"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#country').on('change', function() {
      var countryID = $(this).val();
      if (countryID) {
        $.ajax({
          type: 'POST',
          url: '<?php echo URLROOT . "users/ajaxState" ?>',
          data: 'country_id=' + countryID,
          success: function(html) {
            $('#state').html(html);
            $('#city').html('<option value="">Select state first</option>');
            $('#country').closest('.form-control').addClass('is-valid');   
          }
        });
      } else {
        $('#state').html('<option value="">Select country first</option>');
        $('#city').html('<option value="">Select state first</option>');
      }
    });

    $('#state').on('change', function() {
      var stateID = $(this).val();
      if (stateID) {
        $.ajax({
          type: 'POST',
          url: '<?php echo URLROOT . "users/ajaxState" ?>',
          data: 'state_id=' + stateID,
          success: function(html) {
            $('#city').html(html);
                $('#state').closest('.form-control').addClass('is-valid');
          }
        });
      } else {
        $('#city').html('<option value="">Select state first</option>');
      }
    });
  });
</script>
<script type="text/javascript">
      $(document).ready(function(){
          $('#fname').keyup(function(){
          var regexp = /^[a-zA-Z ]+$/;
          if(regexp.test($('#fname').val())){
            $('#fname').closest('.form-control').removeClass('is-invalid');
            $('#fname').closest('.form-control').addClass('is-valid');
          }else{
            $('#fname').closest('.form-control').addClass('is-invalid');
          }
        })

          $('#lname').keyup(function(){
          var regexp = /^[a-zA-Z ]+$/;
          if(regexp.test($('#lname').val())){
            $('#lname').closest('.form-control').removeClass('is-invalid');
            $('#lname').closest('.form-control').addClass('is-valid');
          }else{
            $('#lname').closest('.form-control').addClass('is-invalid');
          }
        })

          $('#title').keyup(function(){
          var regexp = /^[a-zA-Z0-9 ]+$/;
          if(regexp.test($('#title').val())){
            $('#title').closest('.form-control').removeClass('is-invalid');
            $('#title').closest('.form-control').addClass('is-valid');
          }else{
            $('#title').closest('.form-control').addClass('is-invalid');
          }
        })
           $('#phone').keyup(function(){
          var regexp = /^[0-9]{10}$/;
          if(regexp.test($('#phone').val())){
            $('#phone').closest('.form-control').removeClass('is-invalid');
            $('#phone').closest('.form-control').addClass('is-valid');
          }else{
            $('#phone').closest('.form-control').addClass('is-invalid');
          }
        })

        $('#email').keyup(function(){
          var regexp = /^[a-zA-Z0-9._]+@[a-zA-Z0-9._]+\.[a-zA-Z]{2,4}$/;
          if(regexp.test($('#email').val())){
            $('#email').closest('.form-control').removeClass('is-invalid');
            $('#email').closest('.form-control').addClass('is-valid');
          }else{
            $('#email').closest('.form-control').addClass('is-invalid');
          }
        })

        $('#pass').keyup(function(){
          var regexp = /^[a-zA-Z0-9]{6,50}$/;
          if (regexp.test($('#pass').val())) {
            $('#pass').closest('.form-control').removeClass('is-invalid');
            $('#pass').closest('.form-control').addClass('is-valid');
          }else{
              $('#pass').closest('.form-control').addClass('is-invalid');
          }
        })
         $('#c_pass').keyup(function(){
          var regexp = /^[a-zA-Z0-9]{6,50}$/;
          if (regexp.test($('#c_pass').val())) {
            if($('#c_pass').val() == $('#pass').val()){
            $('#c_pass').closest('.form-control').removeClass('is-invalid');
            $('#c_pass').closest('.form-control').addClass('is-valid');
          }else{
              $('#c_pass').closest('.form-control').addClass('is-invalid');
          }}else{
              $('#c_pass').closest('.form-control').addClass('is-invalid');
          }

        })

 $('#city').change(function(){
          
            $('#city').closest('.form-control').addClass('is-valid');
          
        })
  $('#state').keyup(function(){
          var regexp = /^[a-zA-Z ]+$/;
          if(regexp.test($('#state').val())){
            $('#state').closest('.form-control').removeClass('is-invalid');
            $('#state').closest('.form-control').addClass('is-valid');
          }else{
            $('#state').closest('.form-control').addClass('is-invalid');
          }
        })
   $('#country').keyup(function(){
          var regexp = /^[a-zA-Z ]+$/;
          if(regexp.test($('#country').val())){
            $('#country').closest('.form-control').removeClass('is-invalid');
            $('#country').closest('.form-control').addClass('is-valid');
          }else{
            $('#country').closest('.form-control').addClass('is-invalid');
          }
        })
 
    $('#institute').keyup(function(){
          var regexp = /^[a-zA-Z ]+$/;
          if(regexp.test($('#institute').val())){
            $('#institute').closest('.form-control').removeClass('is-invalid');
            $('#institute').closest('.form-control').addClass('is-valid');
          }else{
            $('#institute').closest('.form-control').addClass('is-invalid');
          }
        })
        // $('#login').click(function(event){
        //   event.preventDefault();
        //   var formData = $('#signIn').serialize();
        //   $.ajax({
        //     url:'action.php',
        //     method:'post',
        //     data:formData + '&action = login'
        //   }).done(function(result))
        // })
      })
    </script>
<?php require APPROOT . '/views/inc/footer.php'; ?>