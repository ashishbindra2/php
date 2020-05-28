<?php require_once('inc/header.php');
require_once('db.php');
?>
<?php
if (isset($_GET['insert']) && $_GET['insert']==1) {
  // code...
  echo "Insertion Sucessfully";

}else {
  echo "something Wrong!!";
}
$sql = "SELECT * FROM signup";
$result = $mysqli->query($sql);

 ?>
 <!-- main body start -->
 <main role="main" class="container">
 	<div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
    <img class="mr-3" src="../../assets/brand/bootstrap-outline.svg" alt="" width="48" height="48">

 		<div class="lh-90 col-md-10">
 			<h6 class="mb-0 text-white lh-100">List of registration people</h6> <!-- it can be customize  -->
 			<small>Since 2011</small>
 		</div>
 		<div class="pull-right  col-md-2"><a href="logout.php"> logout</a></div>
 	</div>

 	<div class="my-3 p-3 bg-white rounded shadow-sm">
 		<h6 class="border-bottom border-gray pb-2 mb-0">Recent updates</h6>
 		<div class="card-body p-0">
 			<form method="post" action="heandler.php">
 				<table class="table table-striped projects">
 					<thead>
 						<tr>
 							<th style="width: 1%">      S.N0    </th>
 							<th>      Name      </th>
 							<th>      last name     </th>
 							<th>      Email    </th>
 							<th>      mobile   </th>
 							<th>      hobby   </th>
 							<th>      DOB</th>
 							<th>      Gender</th>
 							<th>      Status    </th>
 							<th style="width: 12%">   </th>
 						</tr>
 					</thead>
 					<tbody>
          <?php
            if ($result->num_rows > 0) {
             // output data of each row

             while($row = $result->fetch_assoc()) {
             ?>
 								<tr>
 									<td> <?php echo "#"; ?> </td>
 									<td><?php echo $row['fname'];?></td>
                  	<td><?php echo $row['lname'];?></td>
 									<td><?php echo $row['email'];?></td>
 									<td><?php echo $row['mobile'];?></td>
 									<td><?php echo $row['hobby'];?></td>
 									<td><?php echo $row['dob'];?></td>
 									<td><?php echo $row['gender'];?></td>
 									<td class="project-state">
 										<?php if($row['status']=='1'){ ?>
 										<span class="badge badge-success">Success</span>
 										<?php }else{?>
 										<span class="badge badge-danger">Reject</span>
 										<?php }?>
 									</td>
 									<td class="project-actions text-right">
 										<button class="btn btn-info btn-sm">
 												<i class="fas fa-pencil-alt"><i><a href="edit.php?edit=<?php echo $row['id'];?>">Edit
 											</a> <!-- edit button  -->
 										</button>
 										<button type="submit" value="delete" class="btn btn-danger btn-sm"  name="submit">
 											<a  href="heandler.php?del=<?php echo $row['id'];?>">
 											<i class="fas fa-trash"></i>   Delete	</a> </button>
 									</td>
 								</tr>
<?php
}
} ?>
 					</tbody>
 				</table>
 			</form>
 		</div>
 	</div>

 </main>
 <!-- end of main body -->
 <?php include('inc/footer.php') ?>
