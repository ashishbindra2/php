
<?php 
include('db.php'); 
include('function.php'); 
include('header.php');
selectAll();
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
  $ro = editUser($id);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize POST array
  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  $data = [
    'rid' => $_GET['edit'],
    'name' =>  rim($_POST["name"]),
    'email' => rim($_POST["email"]),
    'password' => rim($_POST["password"]),
    'confirm_password' => rim($_POST['confirmPass']), 
    'details' => rim($_POST["detail"]),
    'mobile' => rim($_POST["Mobile"]),
    'comment' => rim($_POST["comment"]),
    'chosse' => rim($_POST["chosse"]),
    'uni'=> rim($_POST["uni"]),
    'statu'=>rim($_POST['statu']),

    'name_err' =>  '',
    'email_err' => '',
    'password_err' => '',
    'confirm_password_err' => '', 
    'details_err' => '',
    'mobile_err' => '',
    'comment_err' => '',
    'chosse_err' => '',
    'uni_err'=> '',
    'statu_err'=>''
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
       if(!empty(findByPhone($data["mobile"],$ro['mobile'])))
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

  if (empty($data["statu"])) {
    $data["statu_err"] = "status is required";
  }else
   {if($data["statu"] == '') { 
      $data["statu_err"] = "status is required";
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
      if(!empty(findByEmail($data["email"],$ro['email'])))
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
    empty($data['password_err']) && empty($data['uni_err']) && empty($data['chosse_err']) && empty($data['comment_err']) &&  empty($data['email_err']) && empty($data['mobile_err'])  &&
    empty($data['details_err']) && empty($data['name_err']) && $data["statu_err"] 
  ) {
                // Hash Password
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    if (updateData($data)) {
      header('location:home.php');
    } else {
      die('Something went wrong');
    }
  } else {
    view('edit', $data);
  }
} else {
  $data = [
    'name' =>  $ro['name'],
    'email' => $ro['email'],
    'password' => $ro['password'],
    'confirm_password' => $ro['password'], 
    'details' => $ro['details'],
    'mobile' => $ro['mobile'],
    'comment' => $ro['comment'],
    'chosse' => $ro['choose'],
    'uni'=> $ro['university'],
     'statu'=>$ro['status'],
    'name_err' =>  '',
    'email_err' => '',
    'password_err' => '',
    'confirm_password_err' => '', 
    'details_err' => '',
    'mobile_err' => '',
    'comment_err' => '',
    'chosse_err' => '',
    'uni_err'=> '',
    'statu_err'=>''
  ];
  view('edit', $data);
}

?>
	<main role="main" class="container">
		<div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
			<img class="mr-3" src="../../assets/brand/bootstrap-outline.svg" alt="" width="48" height="48">
			<div class="lh-100">
				<h6 class="mb-0 text-white lh-100">List of registration people</h6>
				<small>Since 2011</small>
			</div>
		</div>

		<div class="my-3 p-3 bg-white rounded shadow-sm">
			<h6 class="border-bottom border-gray pb-2 mb-0">edit</h6>
        <div class=" text-muted pt-3">
          <form method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label> Name</label>
              <input id="Name" name="name" placeholder="Full Name" type="text" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
              <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
            </div>
            <div class="form-group col-md-6">
              <label>Email</label>
              <input type="email" name="email" id="Email" placeholder="Email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
              <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Mobile</label>
              <input id="Mobile" name="Mobile" placeholder="Mobile No." type="text" class="form-control <?php echo (!empty($data['mobile_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['mobile']; ?>">
              <span class="invalid-feedback"><?php echo $data['mobile_err']; ?></span>
            </div>
            <div class="form-group col-md-4">  
            <label>Choose</label>    
              <select id="inputState" name="chosse" class="form-control <?php echo (!empty($data['chosse_err'])) ? 'is-invalid' : ''; ?>">
                <option selected value="<?php echo (!empty($data['chosse'])) ? $data['chosse'] : '0'; ?>"><?php echo (!empty($data['chosse'])) ? $data['chosse'] : 'Choose'; ?></option>
                <option value = 'New Buyer'> New Buyer</option>
                <option value = 'Action'> Action</option>
                <option value = 'Complaint'> Complaint</option>
                <option value = 'Feedback'> Feedback</option>
              </select> 
              <span class="invalid-feedback"><?php echo $data['chosse_err']; ?></span>
            </div>
             <div class="form-group col-md-4">  
            <label>Status</label>    
              <select id="input" name="statu" class="form-control <?php echo (!empty($data['statu_err'])) ? 'is-invalid' : ''; ?>">
                <option selected value="<?php echo ($data['statu']=='1') ? 'accept' : 'reject'; ?>">
                  <?php if(isset($data['statu']))
                   echo ($data['statu']=='1') ? 'Accept' : 'reject';
                   else
                     echo "no string";
                    ?></option>
                <option value = '1'> Accept</option>
                <option value = '0'> Reject</option>
              </select> 
              <span class="invalid-feedback"><?php echo $data['statu_err']; ?></span>
            </div> </div>
            <div class="form-group col-md-12">
              <label>comment</label>
              <textarea id="comment" name="comment" cols="40" rows="3" class="form-control <?php echo (!empty($data['comment_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['comment']; ?>">
                <?php echo $data['comment']; ?>
              </textarea><span class="invalid-feedback"><?php echo $data['comment_err']; ?></span>
            </div>
         
          <div class="form-row">
            <div class="form-group col-md-6">University</label>
              <input id="Full Name" name="uni" placeholder="University" type="text" class="form-control <?php echo (!empty($data['uni_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['uni']; ?>">
              <span class="invalid-feedback"><?php echo $data['uni_err']; ?></span>
            </div>
            <div class="form-group col-md-6">
              <label>Details</label>
              <input type="text" name="detail" id="inputEmail4" placeholder="Details" class="form-control <?php echo (!empty($data['details_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['details']; ?>">
              <span class="invalid-feedback"><?php echo $data['details_err']; ?></span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Password</label>
              <input id="Full Name" name="password" placeholder="Password" type="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
              <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
            </div>
            <div class="form-group col-md-6">
              <label>Confirm Password</label>
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

</main>
<?php include('footer.php'); ?>
