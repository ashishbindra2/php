
<?php
include('db.php');
include('inc/header.php');
// selectAll();
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  // $ro = editUser($id);
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
            <input id="Name" name="name" placeholder="Full Name" type="text" class="form-control " value="<?php echo $data['name']; ?>">
            <!-- <span class="invalid-feedback"><?php //echo $data['name_err']; ?></span> -->
          </div>
          <div class="form-group col-md-6">
            <label>Email</label>
            <input type="email" name="email" id="Email" placeholder="Email" class="form-control" value="<?php echo $data['email']; ?>">
            <!-- <span class="invalid-feedback"><?php echo $data['email_err']; ?></span> -->
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label>Mobile</label>
            <input id="Mobile" name="Mobile" placeholder="Mobile No." type="text" class="form-control " value="<?php echo $data['mobile']; ?>">

          </div>
          <div class="form-group col-md-4">

          </div>
          <div class="form-group col-md-4">

          </div>
        </div>
        <div class="form-group col-md-12">
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">University</label>
            <input id="Full Name" name="uni" placeholder="University" type="text" class="form-control " value="<?php echo $data['uni']; ?>">

          </div>
          <div class="form-group col-md-6">
            <label>Details</label>
            <input type="text" name="detail" id="inputEmail4" placeholder="Details" class="form-control" value="<?php echo $data['details']; ?>">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Password</label>
            <input id="Full Name" name="password" placeholder="Password" type="password" class="form-control" value="<?php echo $data['password']; ?>">

          </div>
          <div class="form-group col-md-6">
            <label>Confirm Password</label>
            <input type="password" name="confirmPass"  id="confirm Password" placeholder="confirm Password" class="form-control" value="<?php echo $data['confirm_password']; ?>">
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
