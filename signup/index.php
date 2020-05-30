
<?php require_once('inc/header.php');
?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style type="text/css">
img {width:100%;}
a{
  color: blue;
}
a:hover{
 color: green;
}
</style>
<section class="testimonial py-3" >
  <div class="container-flud">
    <div class="row mx-3">
      <div class="col-md-3 py-2 bg-primary text-white text-center ">
        <h4 class="pb-4">Please fill with your details</h4>
        <form method="POST" action="action.php">
          <div class="form-row">
            <div class="form-group col-md-12">
              <input id="fname" name="fname" placeholder="First Name" type="text" class="form-control">
            </div></div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <input id="lname" name="lname" placeholder="Last Name" type="text" class="form-control">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <input id="email" name="email" placeholder="Enter Email" type="email" class="form-control">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <input id="mobile" name="mobile" placeholder="Mobile No." type="text" class="form-control">
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
                <input type="date" name="dob" id="date" class="form-control">
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
              <button type="Submit" name="submit" id="insert" value="insert" class="btn btn-danger">Insert</button>
              <button type="Submit" name="submit" id="update" value="update" class="btn btn-danger" style="display:none;">Update</button>
              <button type="Submit" name="submit" id="delete" value="delete" class="btn btn-danger" style="display:none;">delete </button>

              <input type="hidden" name="bid" value="" id="bid">
            </div>
          </form>
      </div>
      <div class="col-md-9 py-0 border">
         <!-- main body start -->
         <main >
         	<div class="ml-0 p-3 bg-white rounded shadow-sm">
         		<h6 class="border-bottom border-gray pb-2 mb-0">Recent updates</h6>
         		<div class="card-body p-0">
         			<form method="post" action="action.php">
         				<table class="table table-striped projects">
         					<thead>
         						<tr>
         							<th>      S.N0    </th>
         							<th>      Name    </th>
         							<th>      last name </th>
         							<th>      Email   </th>
         							<th>      mobile  </th>
         							<th>      hobby   </th>
         							<th>      DOB     </th>
         							<th>      Gender  </th>
         							<th>      Status  </th>
         							<th>  operations </th>
         						</tr>
         					</thead>
         					<tbody>
                  <?php
                  if (isset($_GET['insert']) && $_GET['insert']==1) {
                    // code...
                    echo "Insertion Sucessfully";
                  }elseif (isset($_GET['insert']) && $_GET['insert']==0) {
                    echo "something Wrong!!";
                  }elseif (isset($_GET['update']) && $_GET['update']==1) {
                    echo "Update Sucessfully";
                  }elseif (isset($_GET['update']) && $_GET['update']==0) {
                    echo "something Wrong!!";
                  }elseif (isset($_GET['delete']) && $_GET['delete']==1) {
                    echo "delete Sucessfully";
                  }elseif (isset($_GET['delete']) && $_GET['delete']==0) {
                    echo "something Wrong!!";
                  }
                  require_once('signup.php');
                  $objSign = new Signup;
                $result =  $objSign->getAllSignup();
                  foreach ($result as $key ) {
                    // code...
                    $data = json_encode($key,true);
                    echo "<tr class='col'>
                                 <td>$key[id]</td>
                                 <td>$key[fname]</td>
                                 <td>$key[lname]</td>
                                 <td>$key[email]</td>
                                 <td>$key[mobile]</td>
                                 <td>$key[hobby]</td>
                                 <td>$key[dob]</td>
                                 <td>$key[gender]</td>
                                 <td>$key[status]</td>
                                 <td>
                                 <a href='javascript:updateData($data)' class='text-black'>edit</a>
                                 <a href='javascript:deleteData($data)'>delete</a></td>
                  </tr>  ";
                  }
                   ?>
         					</tbody>
         				</table>
         			</form>
         		</div>
         	</div>
         </main>
        </div>
      </div>
    </div>
  </section>
  <script>
  function updateData(key){
         document.getElementById('bid').value = key.id;
    document.getElementById('fname').value = key.fname;
    document.getElementById('lname').value = key.lname;
    document.getElementById('email').value = key.email;
    document.getElementById('mobile').value = key.mobile;
    document.getElementById('gender').value = key.gender;
    document.getElementById('date').value = key.dob;
    // document.getElementById('status').value = key.status;
    // document.getElementById('hobby1').checkbox = key.hobby;
    document.getElementById('insert').style.display = "none";
    document.getElementById('update').style.display = 'block';
    // document.querySelector('#insert').style.background ="yellow";
  }
  function deleteData(key){
    // alert(bid);
    document.getElementById('bid').value = key.id;
    document.getElementById('fname').value = key.fname;
    document.getElementById('lname').value = key.lname;
    document.getElementById('email').value = key.email;
    document.getElementById('mobile').value = key.mobile;
    document.getElementById('gender').value = key.gender;
    document.getElementById('date').value = key.dob;

    document.getElementById('insert').style.display = "none";
    document.getElementById('update').style.display = 'none';
    document.getElementById('delete').style.display = 'block';
  }
  </script>
  <!-- end of main body -->
  <?php include('inc/footer.php') ?>
