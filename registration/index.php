<?php  
include('db.php');
include('function.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize POST array
  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  $data = [
    'name' =>  rim($_POST["name"]),
    'email' => rim($_POST["email"]),
    'password' => rim($_POST["password"]),
    'confirm_password' => rim($_POST['confirmPass']), 
    'details' => rim($_POST["detail"]),
    'mobile' => rim($_POST["Mobile"]),
    'comment' => rim($_POST["comment"]),
    'chosse' => rim($_POST["chosse"]),
    'uni'=> rim($_POST["uni"]),

    'name_err' =>  '',
    'email_err' => '',
    'password_err' => '',
    'confirm_password_err' => '', 
    'details_err' => '',
    'mobile_err' => '',
    'comment_err' => '',
    'chosse_err' => '',
    'uni_err'=> '',
  ];

  if (empty($data["name"])) {
    $data["name_err"] = "name is required";
  }
  if (empty($data["details"])) {
    $data["details_err"] = "details is required";
  }
  if (empty($data["mobile"])) {
    $data["mobile_err"] = "mobile number is required";
  }else{
      if(!empty(findUserByPhone($data["mobile"])))
      $data["mobile_err"] = "mobile is already Exisit";
    if(preg_match("/^[0-9]{10}$/", $data["mobile"])) {
    }
    else{
      $data["mobile_err"] = "mobile number is wrong";
    }
  }
  if (empty($data["comment"])) {
    $data["comment_err"] = "comment is required";
  }
  if (empty($data["chosse"])) {
    $data["chosse_err"] = "chosse is required";
  }else{
    if($data["chosse"] == '0') { 
      $data["chosse_err"] = "chosse is required";
    } 
  }
  if (empty($data["uni"])) {
    $data["uni_err"] = "institute_name is required";
  }

  if (empty($data["email"])) {
    $data["email_err"] = "email is required";
  } else {
    if (!filter_var($data["email"], FILTER_VALIDATE_EMAIL))
      $data["email_err"] = "Invalid email format";
    if(!empty(findUserByEmail($data["email"])))
      $data["email_err"] = "email is already Exisit";
  }
            // Validate Password
  if (empty($data['password'])) {
    $data['password_err'] = 'Please enter password';
  } elseif (strlen($data['password']) < 6) {
    $data['password_err'] = 'Password must be at least 6 characters';
  }

            // Validate Confirm Password
  if (empty($data['confirm_password'])) {
    $data['confirm_password_err'] = 'Please confirm password';
  } else {
    if ($data['password'] != $data['confirm_password']) {
      $data['confirm_password_err'] = 'Passwords do not match';
    }
  }

  if (
       empty($data['password_err']) && empty($data['uni_err']) && empty($data['chosse_err']) && empty($data['comment_err'])&&  empty($data['email_err']) && empty($data['mobile_err'])  && empty($data['confirm_password_err']) && empty($data['details_err']) && empty($data['name_err']) 
  ) {
                // Hash Password
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    if (insertData($data)) {
      session_start();
     $S =  selectID($data["email"]);
      $_SESSION['rid'] = $S['rid'];
      $_SESSION['name'] = $S['name'];
      header('location:home.php?id='.$_SESSION['rid']);
    } else {
      // die('Something went wrong');
    }
    //}
    //sumit error
    //phone
    //update detail
  } else {
    view('index', $data);
  }
} else {
  $data = [
    'name' =>  '',
    'email' => '',
    'password' => '',
    'confirm_password' => '', 
    'details' => '',
    'mobile' => '',
    'comment' => '',
    'chosse' => '',
    'uni'=> '',

    'name_err' =>  '',
    'email_err' => '',
    'password_err' => '',
    'confirm_password_err' => '', 
    'details_err' => '',
    'mobile_err' => '',
    'comment_err' => '',
    'chosse_err' => '',
    'uni_err'=> '',
  ];
  view('index', $data);
}
  
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
  img {width:100%;}
</style>
<section class="testimonial py-5" id="testimonial">
  <div class="container">
    <div class="row ">
      <div class="col-md-4 py-5 bg-primary text-white text-center ">
        <div class=" ">
          <div class="card-body">
            <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%">
            <h2 class="py-3">Registration</h2>
            <p>Test</p>
          </div>
        </div>
      </div>
      <div class="col-md-8 py-3 border">
        <h4 class="pb-4">Please fill with your details</h4>
        <form method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <input id="Name" name="name" placeholder="Full Name" type="text" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
              <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
            </div>
            <div class="form-group col-md-6">
              <input type="email" name="email" id="Email" placeholder="Email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
              <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <input id="Mobile" name="Mobile" placeholder="Mobile No." type="text" class="form-control <?php echo (!empty($data['mobile_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['mobile']; ?>">
              <span class="invalid-feedback"><?php echo $data['mobile_err']; ?></span>
            </div>
            <div class="form-group col-md-6">      
              <select id="inputState" name="chosse" class="form-control <?php echo (!empty($data['chosse_err'])) ? 'is-invalid' : ''; ?>">
                   <option selected value="<?php echo (!empty($data['chosse'])) ? $data['chosse'] : '0'; ?>"><?php echo (!empty($data['chosse'])) ? $data['chosse'] : 'Choose'; ?></option>
                <option value = 'New Buyer'> New Buyer</option>
                <option value = 'Action'> Action</option>
                <option value = 'Complaint'> Complaint</option>
                <option value = 'Feedback'> Feedback</option>
              </select> 
              <span class="invalid-feedback"><?php echo $data['chosse_err']; ?></span>
            </div>
            <div class="form-group col-md-12">
              <textarea id="comment" name="comment" cols="40" rows="3" class="form-control <?php echo (!empty($data['comment_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['comment']; ?>"><?php echo $data['comment']; ?>
              </textarea><span class="invalid-feedback"><?php echo $data['comment_err']; ?></span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <input id="Full Name" name="uni" placeholder="University" type="text" class="form-control <?php echo (!empty($data['uni_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['uni']; ?>">
              <span class="invalid-feedback"><?php echo $data['uni_err']; ?></span>
            </div>
            <div class="form-group col-md-6">
              <input type="text" name="detail" id="inputEmail4" placeholder="Details" class="form-control <?php echo (!empty($data['details_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['details']; ?>">
              <span class="invalid-feedback"><?php echo $data['details_err']; ?></span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <input id="Full Name" name="password" placeholder="Password" type="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
              <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
            </div>
            <div class="form-group col-md-6">
              <input type="password" name="confirmPass"  id="confirm Password" placeholder="confirm Password" class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
              <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
            </div>
          </div>
                
                        <div class="form-row">
                          <button type="Submit" name="Submit" class="btn btn-danger">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </section>
