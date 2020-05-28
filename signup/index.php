
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style type="text/css">
img {width:100%;}
</style>
<section class="testimonial py-5" id="testimonial">
  <div class="container">
    <div class="row 51 ml-5">
      <div class="col-md-4 py-5 bg-primary text-white text-center ">
        <div class=" ">
          <div class="card-body">
            <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%">
            <h2 class="py-3">Registration</h2>
            <p>Please Register here</p>
          </div>
        </div>
      </div>
      <div class="col-md-7 py-3 border">
        <h4 class="pb-4">Please fill with your details</h4>
        <form method="POST" action="heandler.php">
          <div class="form-row">
            <div class="form-group col-md-12">
              <input id="Fname" name="fname" placeholder="First Name" type="text" class="form-control">
            </div></div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <input id="Lname" name="lname" placeholder="Last Name" type="text" class="form-control">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <input id="email" name="email" placeholder="Enter Email" type="email" class="form-control">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <input id="Mobile" name="mobile" placeholder="Mobile No." type="text" class="form-control">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input id="hobby1" name="hobby" value="Cricket"  type="checkbox" class="custom-control-input">
                  <label class="custom-control-label" for="hobby1">Cricket</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input id="hobby2" name="hobby" value="chess"  type="checkbox" class="custom-control-input">
                  <label class="custom-control-label" for="hobby2">Chess</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input id="hobby3" name="hobby" value="card"  type="checkbox" class="custom-control-input">
                  <label class="custom-control-label" for="hobby3">Cards</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <input type="date" name="dob" id="date"    class="form-control">
              </div>
              <div class="form-group col-md-12">
                <div class="custom-control custom-radio custom-control-inline">
                  <input id="gender" name="gender" type="radio" value="m" class="custom-control-input">
                  <label class="custom-control-label" for="gender">Male</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="gender2" name="gender" value="f" class="custom-control-input">
                  <label class="custom-control-label" for="gender2">female</label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <button type="Submit" name="submit" value="insert" class="btn btn-danger">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
