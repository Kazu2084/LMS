<?php
//include ('../Common/header.php'); ?>
<?php
include('../Common/librarian-sidenav-header.php');
include('../Common/header.php'); ?>
<div class="app-content">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Borrowed Books</h1>
		<a href="borrowed_print_sort.php" target="_blank" style="background:none;">
			<button name="print" type="submit" class="btn btn-danger"><i class="fa fa-print"></i> Print</button>
		</a>
	</div>
	<div></div>
	<br />


	<!-- <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><i class="fa fa-book"></i> Borrowed Books</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li>
							<a href="borrowed_print_sort.php" target="_blank" style="background:none;">
							<button name="print" type="submit" class="btn btn-danger"><i class="fa fa-print"></i> Print</button>
							</a>
							</li> -->
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
	<!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li>
						</ul>
						
						<div class="clearfix"></div> -->

	<form method="POST" class="form-inline">

		<div class="control-group">
			<div class="controls">
				<div class="col-md-3">
					<input type="date" style="color:black;"
						value="<?php echo (isset($_POST['datefrom'])) ? $_POST['datefrom'] : ''; ?>" name="datefrom"
						class="form-control has-feedback-left" placeholder="Date From"
						aria-describedby="inputSuccess2Status4">
					<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
					<span id="inputSuccess2Status4" class="sr-only">(success)</span>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="col-md-3">
					<input type="date" style="color:black;"
						value="<?php echo (isset($_POST['dateto'])) ? $_POST['dateto'] : ''; ?>" name="dateto"
						class="form-control has-feedback-left" placeholder="Date To"
						aria-describedby="inputSuccess2Status4">
					<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
					<span id="inputSuccess2Status4" class="sr-only">(success)</span>
				</div>
			</div>
		</div>

		<button type="submit" name="search" class="btn btn-primary btn-outline"><i class="fa fa-calendar-o"></i> Search
			By Date Borrowed</button>

	</form>
	<!-- <div class="clearfix"></div> -->

	<!-- <div class="x_content"> -->
	<!-- content starts here -->

	<!-- <div class="table-responsive">
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

			<span style="float:left;"> -->
	<?php
	// $count = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `report` where report.date_transaction BETWEEN '$datefrom 00:00:01' and '$dateto 23:59:59' and report.detail_action like '%$status%'")) or die(mysqli_error());
	// $count1 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `report` WHERE `detail_action` = 'Borrowed Book'")) or die(mysqli_error());
	// $count2 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `report` WHERE `detail_action` = 'Returned Book'")) or die(mysqli_error());
	?>
	<a href="borrowed.php"><button class="btn btn-primary"><i class="fa fa-reply"></i> All Reports
			<?php // echo $count_penalty['total']; ?>
		</button></a>
	<!---		<a href="borrowed_report.php"><button class="btn btn-success btn-outline"><i class="fa fa-info"></i> Borrowed Reports (<?php // echo  $count1['total']; ?>)</button></a>
							<a href="returned_report.php"><button class="btn btn-danger btn-outline"><i class="fa fa-info"></i> Returned Reports (<?php // echo $count2['total']; ?>)</button></a>
					-->
	<!-- </span> -->
	<div class="products-area-wrapper tableView">






		<div class="products-header">
			<?php
			$_SESSION['datefrom'] = $_POST['datefrom'];
			$_SESSION['dateto'] = $_POST['dateto'];
			?>
			<div class="product-cell">Barcode</div>
			<div class="product-cell">Borrower Name</div>
			<div class="product-cell">Title</div>
			<div class="product-cell">Date Borrowed</div>
			<div class="product-cell">Due Date</div>
			<div class="product-cell">Date Returned</div>
			<div class="product-cell">Status</div>
		</div>

		<?php
		$datefrom = $_POST['datefrom'];
		$dateto = $_POST['dateto'];
		$borrow_query = mysqli_query($con, "SELECT * FROM borrow_book
									LEFT JOIN book ON borrow_book.book_id = book.book_id 
									LEFT JOIN user ON borrow_book.user_id = user.user_id 
									where (borrow_book.date_borrowed BETWEEN '" . $_POST['datefrom'] . " 00:00:01' and '" . $_POST['dateto'] . " 23:59:59') and borrowed_status = 'borrowed'
									ORDER BY borrow_book.borrow_book_id DESC") or die(mysqli_error());
		$borrow_count = mysqli_num_rows($borrow_query);

		while ($borrow_row = mysqli_fetch_array($borrow_query)) {
			$id = $borrow_row['borrow_book_id'];
			$book_id = $borrow_row['book_id'];
			$user_id = $borrow_row['user_id'];

			?>
			<div class="products-row">
				<div class="product-cell"><span>
						<?php echo $borrow_row['book_barcode']; ?>
					</span></div>
				<div class='product-cell' style="text-transform: capitalize"><a
						href="borrow_book.php?school_number=<?php echo $borrow_row['school_number']; ?>"><?php echo $borrow_row['firstname'] . " " . $borrow_row['lastname']; ?></a></span>
			</div>
			<div class='product-cell' style="text-transform: capitalize">
				<?php echo $borrow_row['book_title']; ?>
				</span>
		</div>
		<div class="product-cell"><span>
				<?php echo date("M d, Y h:m:s a", strtotime($borrow_row['date_borrowed'])); ?>
			</span></div>
		<div class="product-cell"><span>
				<?php echo date("M d, Y h:m:s a", strtotime($borrow_row['due_date'])); ?>
			</span></div>
		<div class="product-cell"><span>
				<?php echo ($borrow_row['date_returned'] == "0000-00-00 00:00:00") ? "Pending" : date("M d, Y h:m:s a", strtotime($borrow_row['date_returned'])); ?>
			</span></div>
		<?php
		if ($borrow_row['borrowed_status'] != 'returned') {
			echo "<div class='product-cell' class='alert alert-success'>" . $borrow_row['borrowed_status'] . "</span></div>";
		} else {
			echo "<div class='product-cell'  class='alert alert-danger'>" . $borrow_row['borrowed_status'] . "</span></div>";
		}
		?>
	</div>

<?php } ?>
</div>
</div>

<!-- content ends here -->
</div>
</div>
</div>
</div>

<?php include('../Common/footer.php'); ?>