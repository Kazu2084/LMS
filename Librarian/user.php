<?php
include('../Common/librarian-sidenav-header.php');
include('../Common/header.php'); ?>
<div class="app-content">
	<div class="app-content-header">
		<h1 class="app-content-headerText">User Information</h1>
		<a href="add_user.php" style="background:none; position:relative; left:320px">
			<button class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Add User</button>
		</a>
		<a href="member_print.php" target="_blank" style="background:none; float:right;">
			<button style="float:right;" class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print User
				List</button>
		</a>
	</div>

	<div class="app-content-actions">

		<!-- <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel"> -->

		<!-- <a href="print_barcode.php" target="_blank" style="background:none;">
							<button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print Members Barcode</button>
							</a> -->
		<!-- 
					<div class="x_title">
						<h2>User Information</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li>
								<a href="add_user.php" style="background:none;">
									<button class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Add
										User</button>
								</a>
							</li>
							<li>
								<a href="member_print.php" target="_blank" style="background:none;">
									<button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print User
										List</button>
								</a>
							</li> -->
		<!-- <li>
							<a href="import_members.php" style="background:none;">
							<button class="btn btn-success btn-outline"><i class="fa fa-upload"></i> Import Members</button>
							</a>
							</li> -->
		<!---    <li>
							<a href="update_members_status.php" style="background:none;">
							<button class="btn btn-danger btn-outline"><i class="fa fa-cog fa-spin"></i> Activate All Members</button>
							</a>
							</li>	-->
		<!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li> -->
		<!-- If needed 
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
									<i class="fa fa-wrench"></i>
								</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Settings 1</a></li>
									<li><a href="#">Settings 2</a></li>
								</ul>
							</li>
						-->
		<!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
		<!-- </ul>
						<div class="clearfix"></div>
					</div> -->
		<!-- <div class="x_content"> -->
		<!-- content starts here -->
		<div class="products-area-wrapper tableView">
			<div class="products-header">
				<div class="product-cell">College ID</div>
				<div class="product-cell">Name</div>
				<div class="product-cell">Type</div>
				<div class="product-cell">Course</div>
				<!-- <div class="product-cell">Section</div> -->
				<div class="product-cell">Status</div>
				<div class="product-cell">Action</div>
			</div>
			<!-- <div class="table-responsive">
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered"
						id="example"> -->

			<!-- <thead>
							<tr> -->
			<!---		<th>Image</th>	-->
			<!-- <th>School ID</th>
								<th>Member Full Name</th>
								<th>Type</th>
								<th>Level</th>
								<th>Section</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead> -->

			<!-- <div class="products-row">
				<div class="product-cell"><span></span></div> -->
				<?php
				$result = mysqli_query($con, "select * from user order by user_id DESC") or die(mysqli_error());
				while ($row = mysqli_fetch_array($result)) {
					$id = $row['user_id'];
					?>
					<div class="products-row">
						<!---		<div class="product-cell"><span>
								<?php // if( $row['user_image'] != ""): ?>
								<img src="upload/<?php // echo $row['user_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
								<?php // else: ?>
								<img src="images/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
								<?php // endif; ?>
								</span></div>  either this <div class="product-cell"><span><a target="_blank" href="view_members_barcode.php?code=<?php // echo $row['school_number']; ?>"><?php // echo $row['school_number']; ?></a></span></div> -->
						<div class="product-cell"><span><?php echo $row['school_number']; ?></span></div>
						<div class="product-cell"><span>
								<?php echo $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname']; ?>
							</span></div>
						<div class="product-cell"><span>
								<?php echo $row['type']; ?>
							</span></div>
						<div class="product-cell"><span>
								<?php echo $row['level']; ?>
							</span></div>
						<!-- <div class="product-cell"><span>
								<?php 
								//echo $row['section']; ?>
							</span></div> -->
						<div class="product-cell"><span>
								<?php echo $row['status']; ?>
							</span></div>
						<div class="product-cell"><span>
								<a class="btn btn-primary" for="ViewAdmin"
									href="view_user.php<?php echo '?user_id=' . $id; ?>">
									<i class="fa fa-search"></i>
								</a>
								<a class="btn btn-warning" for="ViewAdmin"
									href="edit_user.php<?php echo '?user_id=' . $id; ?>">
									<i class="fas fa-edit"></i>

								</a>
								<a class="btn btn-danger" for="DeleteAdmin" href="user.php#delete<?php echo $id; ?>"
									data-toggle="modal" data-target="#delete<?php echo $id; ?>">
									<i class="far fa-trash-alt"></i>
								</a>

								<!-- delete modal user -->
								<div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1" role="dialog"
									aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel"><i
														class="glyphicon glyphicon-user"></i>User</h4>
											</div>
											<div class="modal-body">
												<div class="alert alert-danger">
													Are you sure you want to delete?
												</div>
												<div class="modal-footer">
													<button class="btn btn-inverse" data-dismiss="modal"
														aria-hidden="true"><i
															class="glyphicon glyphicon-remove icon-white"></i>
														No</button>
													<a href="delete_user.php<?php echo '?user_id=' . $id; ?>"
														style="margin-bottom:5px;" class="btn btn-primary"><i
															class="glyphicon glyphicon-ok icon-white"></i>
														Yes</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</span></div>
					</div>
				<?php } ?>

			</div>

			<!-- content ends here -->
		</div>
	</div>
</div>
</div>

<?php
include('../Common/footer.php'); ?>