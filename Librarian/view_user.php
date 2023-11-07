<?php
//include ('../Common/header.php'); ?>

<?php
include('../Common/librarian-sidenav-header.php');
include('../Common/header.php'); ?>
<div class="app-content">
	<div class="app-content-header">
		<h1 class="app-content-headerText">User Information</h1>
		<a href="user.php" style="background:none;">
			<button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button>
		</a>
	</div>
	<div></div>
	<br />
	<!-- <div class="clearfix"></div>
 
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>User Information</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li>
							<a href="user.php" style="background:none;">
							<button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button>
							</a>
							</li> -->

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

	<!-- </ul>
						<div class="clearfix"></div>
					</div> -->
	<!-- <div class="x_content"> -->
	<!-- content starts here -->

	<!-- <div class="table-responsive">
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">

				<thead> -->

	<div class="products-area-wrapper tableView">
		<div class="products-header">
			<!---		<div class="product-cell">User Image</div>	-->
			<div class="product-cell">Name</div>
			<div class="product-cell">Contact</div>
			<div class="product-cell">Gender</div>
			<div class="product-cell">Address</div>
			<div class="product-cell">Type</div>
			<div class="product-cell">Course</div>
			<div class="product-cell">Status</div>
			<div class="product-cell">User Added</div>
		</div>


		<?php

		if (isset($_GET['user_id']))
			$id = $_GET['user_id'];
		$result1 = mysqli_query($con, "SELECT * FROM user WHERE user_id='$id'");
		while ($row = mysqli_fetch_array($result1)) {
			?>
			<div class="products-row">
				<!---		<div class="product-cell"><span>
								<?php // if($row['user_image'] != ""): ?>
								<img src="upload/<?php // echo $row['user_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
								<?php // else: ?>
								<img src="images/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
								<?php // endif; ?>
								</span></div> -->
				<div class="product-cell"><span>
						<?php echo $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname']; ?>
					</span></div>
				<div class="product-cell"><span>
						<?php echo $row['contact']; ?>
					</span></div>
				<div class="product-cell"><span>
						<?php echo $row['gender']; ?>
					</span></div>
				<div class="product-cell"><span>
						<?php echo $row['address']; ?>
					</span></div>
				<div class="product-cell"><span>
						<?php echo $row['type']; ?>
					</span></div>
				<div class="product-cell"><span>
						<?php echo $row['level']; ?>
					</span></div>
				<div class="product-cell"><span>
						<?php echo $row['status']; ?>
					</span></div>
				<div class="product-cell"><span>
						<?php echo date("M d, Y h:m:s a", strtotime($row['user_added'])); ?>
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
//include ('../Common/footer.php'); ?>