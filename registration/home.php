
<?php 
include('db.php'); //database connection
include('function.php'); //all function 
include('header.php'); // header of the page

$row = selectAll(); //fetch  the detail of all user
if (isset($_GET['del'])) { // delete condition check need to improve
	$id = $_GET['del']; //get the query string
	deleteUser($id);  //calling delete function
}
?>
<!-- main body start -->
<main role="main" class="container">
	<div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
		<img class="mr-3" src="../../assets/brand/bootstrap-outline.svg" alt="" width="48" height="48">
		<div class="lh-100">
			<h6 class="mb-0 text-white lh-100">List of registration people</h6> <!-- it can be customize  -->
			<small>Since 2011</small>
		</div>
	</div>

	<div class="my-3 p-3 bg-white rounded shadow-sm">
		<h6 class="border-bottom border-gray pb-2 mb-0">Recent updates</h6>
		<div class="card-body p-0">
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<table class="table table-striped projects">
					<thead>
						<tr>
							<th style="width: 1%">      S.N0    </th>
							<th>      Name      </th>
							<th>      Email     </th>
							<th>      Choose    </th>
							<th>      Comment   </th>
							<th>      Details   </th>
							<th>      University</th>
							<th>      Status    </th>
							<th style="width: 12%">   </th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(isset($row)): 
							foreach($row as $r):?>
								<tr>
									<td> # </td>
									<td><?php echo $r['name'];?></td>
									<td><?php echo $r['email'];?></td>
									<td><?php echo $r['choose'];?></td>
									<td><?php echo $r['comment'];?></td>
									<td><?php echo $r['details'];?></td>
									<td><?php echo $r['university'];?></td>
									<td class="project-state">
										<span class="badge badge-success">Success</span>
									</td>
									<td class="project-actions text-right">
										<button class="btn btn-info btn-sm">
											
												<i class="fas fa-pencil-alt"><i><a href="edit.php?edit=<?php echo $r['rid'];?>">Edit
											</a> <!-- edit button  -->
										</button>
										<button type="submit" class="btn btn-danger btn-sm"  name="delete">  
											<a  href="home.php?del=<?php echo $r['rid'];?>">
											<i class="fas fa-trash"></i>   Delete	</a> </button> 
									</td>
								</tr>
							<?php  endforeach;
						endif; ?>
					</tbody>
				</table>
			</form>
		</div>
	</div>

</main>
<!-- end of main body -->
<?php include('footer.php') ?>