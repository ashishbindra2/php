<?php include("includes/nav.php"); ?>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#country').on('change', function() {
      var countryID = $(this).val();
      if (countryID) {
        $.ajax({
          type: 'POST',
          url: '<?php echo URLROOT . "associates/ajaxState" ?>',
          data: 'country_id=' + countryID,
          success: function(html) {
            $('#state').html(html);
            $('#city').html('<option value="">Select state first</option>');
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
          url: '<?php echo URLROOT . "associates/ajaxState" ?>',
          data: 'state_id=' + stateID,
          success: function(html) {
            $('#city').html(html);
          }
        });
      } else {
        $('#city').html('<option value="">Select state first</option>');
      }
    });
  });
</script>

<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Add Reviewer</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading"> Reviewer Details </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <form role="form" method="POST">
                <div class="form-row">
                  <div class="form-group col-lg-4">
                    <label>Name</label><span class="error"> * <?php echo $data['name_err']; ?></span>
                    <input class="form-control" type="text" placeholder="Enter name" name="name">
                  </div>
                  <div class="form-group col-lg-4">
                    <label>Email</label><span class="error">
                      * <?php echo $data['email_err']; ?></span>
                    <input type="email" class="form-control" placeholder="Enter email" name="email">
                  </div>
                  <div class="form-group col-lg-4">
                    <label>Photograph</label>
                    <span class="error">
                      * <?php echo $data['img_err'] ?></span>
                    <input type="file" class="form-control" name="photograph">
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-lg-4">
                    <label>Title</label><span class="error">
                      * <?php echo $data['title_err']; ?></span>
                    <input type="text" class="form-control" placeholder="Enter Title" name="title">
                  </div>
                  <div class="form-group col-lg-4">
                    <label>Designation</label><span class="error">
                      * <?php echo $data['des_err']; ?></span>
                    <input type="text" class="form-control" placeholder="Enter designation" name="designation">
                  </div>
                  <div class="form-group col-lg-4">
                    <label>Stream</label><span class="error">
                      * <?php echo $data['stream_err']; ?></span>
                    <select class="form-control" name="stream">
                      <?php foreach ($data['stream'] as $key) { ?>
                        <option value="<?php echo $key->STREAM_ID; ?>"><?php echo $key->STREAM_NAME; ?></option>
                      <?php  }
                      ?>
                    </select>
                  </div>

                </div>
                <div class="form-row">

                  <div class="form-group col-lg-4">
                    <label>Institute Name</label><span class="error">
                      * <?php echo $data['institude_err']; ?></span>
                    <input type="text" class="form-control" placeholder="Enter institute name" name="institute_name">
                  </div>
                  <div class="form-group col-lg-4">
                    <label>Institute Address</label><span class="error">
                      * <?php echo $data['address_err']; ?></span>
                    <input type="text" class="form-control" placeholder="Enter institute address" name="institute_address">
                  </div>
                  <div class="form-group col-lg-4">
                    <label>Webpage</label>
                    <span class="error">
                      * <?php echo $data['webPage_err']; ?></span>
                    <input type="text" class="form-control" placeholder="Enter webpage" name="webpage">
                  </div>
                </div>
                <div class="form-row">

                  <div class="form-group col-lg-4">
                    <label>Select Country</label><span class="error">
                      * <?php echo $data['country_err']; ?></span>
                    <select name="country" id="country" class="form-control">
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
                  </div>

                  <div class="form-group col-lg-4">
                    <label>Select state</label><span class="error">
                      * <?php echo $data['state_err']; ?></span>
                    <select name="state" id="state" class="form-control">
                      <option value="1">Select country first</option>
                    </select>
                  </div>
                  <div class="form-group col-lg-4">
                    <label>Select City</label><span class="error">
                      * <?php echo $data['city_err']; ?></span>
                    <select name="city" id="city" class="form-control">
                      <option value="1">Select state first</option>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-lg-4">
                    <label>Password</label><span class="error">
                      * <?php echo $data['password_err']; ?></span>
                    <input class="form-control" placeholder="Enter password" name="password" type="password">
                  </div>
                  <div class="form-group col-lg-4">
                    <label>Confirm Password</label><span class="error">
                      * <?php echo $data['password_err']; ?></span>
                    <input class="form-control" placeholder="Enter confirm password" name="pass2" type="password">
                  </div>
                  <div class="form-group col-lg-4">
                    <label>D.O.B</label><span class="error">
                      * <?php echo $data['dob_err']; ?></span>
                    <input type="text" class="form-control" placeholder="Enter D-O-R" name="D_O_R">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <label>Gender</label>
                    <label class="radio-inline">
                      <input type="radio" name="gender" id="male" value="Male" checked>Male
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="gender" id="female" value="Female">Female
                    </label><span class="error">
                      * <?php echo $data['gender_err']; ?></span>
                  </div>
                  <div class="form-group col-lg-6">
                    <label>Status</label>
                    <label class="radio-inline">
                      <input type="radio" name="status" id="1" value="1">Active
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="status" id="options2" value="0" checked>Non-Active
                    </label>
                    <span class="error">
                      * <?php echo $data['status_err']; ?></span>
                  </div>
                </div>
                <div class="form-row">

                </div>
                <button type="submit" class="btn btn-default">Submit</button>
                <button type="reset" class="btn btn-default">Reset</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/panelFooter.php'; ?>