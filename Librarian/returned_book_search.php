<?php
//include('../Common/header.php'); ?>

<?php
include('../Common/librarian-sidenav-header.php');
include('../Common/header.php'); ?>
<div class="app-content">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Returned Books</h1>
		<a href="returned_book_print.php" target="_blank" style="background:none; position:relative; left:354px">
			<button name="print" type="submit" class="btn btn-danger"><i class="fa fa-print"></i> Print</button>
		</a>
		<a href="returned_book.php"><button class="btn btn-primary"><i class="fas fa-file-alt"></i> All Reports
				<?php // echo $count_penalty['total']; ?>
			</button></a>
	</div>
	<div></div>
	<br />

	<!-- <div class="clearfix"></div>
 
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Returned Books</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li>
							<a href="returned_book_print.php" target="_blank" style="background:none;">
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
	<!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
	<!-- </ul> -->
	<!-- 						
						<div class="clearfix"></div> -->

	<form method="POST" class="form-inline">

		<div class="control-group">
			<div class="controls">
				<div>&nbsp;&nbsp;&nbsp;&nbsp;Date from :</div>
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
				<div>&nbsp;&nbsp;&nbsp;&nbsp;To :</div>
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
	<!-- <div class="clearfix"></div>
					</div>
					<div class="x_content"> -->
	<!-- content starts here -->





	<div class="products-area-wrapper tableView">
		<?php
		$_SESSION['datefrom'] = $_POST['datefrom'];
		$_SESSION['dateto'] = $_POST['dateto'];
		?>
		<?php
		$datefrom = $_POST['datefrom'];
		//echo $datefrom; 
		$dateto = $_POST['dateto'];
		//echo $dateto;
		$return_query = mysqli_query($con, "select * from return_book 
							LEFT JOIN book ON return_book.book_id = book.book_id 
							LEFT JOIN user ON return_book.user_id = user.user_id 
							where return_book.date_returned BETWEEN '" . $_POST['datefrom'] . " 00:00:01' and '" . $_POST['dateto'] . " 23:59:59' 
							order by return_book.return_book_id DESC");
		$return_count = mysqli_num_rows($return_query);

		$count_penalty = mysqli_query($con, "SELECT sum(book_penalty) FROM return_book 
							where return_book.date_returned BETWEEN '" . $_POST['datefrom'] . " 00:00:01' and '" . $_POST['dateto'] . " 23:59:59'  ");
		$count_penalty_row = mysqli_fetch_array($count_penalty);

		?>

		<?php
		// $count = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `report` where report.date_transaction BETWEEN '$datefrom 00:00:01' and '$dateto 23:59:59' and report.detail_action like '%$status%'")) or die(mysqli_error());
		// $count1 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `report` WHERE `detail_action` = 'Borrowed Book'")) or die(mysqli_error());
		// $count2 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `report` WHERE `detail_action` = 'Returned Book'")) or die(mysqli_error());
		?>

		<!-- <a href="returned_book.php"><button class="btn btn-primary"><i class="fa fa-reply"></i> All Reports
			<?php // echo $count_penalty['total']; ?>
		</button></a> -->
		<!---		<a href="borrowed_report.php"><button class="btn btn-success btn-outline"><i class="fa fa-info"></i> Borrowed Reports (<?php // echo  $count1['total']; ?>)</button></a>
							<a href="returned_report.php"><button class="btn btn-danger btn-outline"><i class="fa fa-info"></i> Returned Reports (<?php // echo $count2['total']; ?>)</button></a>
					-->


		<div class="pull-left">

			<div class="span">
				<div class="alert alert-info"><i class="icon-credit-card icon-large"></i>&nbsp;Total Amount of
					Penalty:&nbsp;
					<?php echo $count_penalty_row['sum(book_penalty)'] . ".00"; ?>
				</div>
			</div>
		</div>

		<div class="products-header">
			<div class="product-cell">Barcode</div>
			<div class="product-cell">Borrower Name</div>
			<div class="product-cell">Title</div>
			<!---	<div class="product-cell">Author</div>
									<div class="product-cell">ISBN</div>	-->
			<div class="product-cell">Date Borrowed</div>
			<div class="product-cell">Due Date</div>
			<div class="product-cell">Date Returned</div>
			<div class="product-cell">Penalty</div>
		</div>
	


	<?php
	while ($return_row = mysqli_fetch_array($return_query)) {
		$id = $return_row['return_book_id'];
		?>
		<div class="products-row">
			<div class="product-cell"><span>
					<?php echo $return_row['book_barcode']; ?>
				</span></div>
			<div class="product-cell" style="text-transform: capitalize"><span>
					<?php echo $return_row['firstname'] . " " . $return_row['lastname']; ?>
				</span></div>
			<div class="product-cell" style="text-transform: capitalize"><span>
					<?php echo $return_row['book_title']; ?>
				</span></div>
			<!---	<div class="product-cell" style="text-transform: capitalize"><?php // echo $return_row['author']; ?></span></div>
								<div class="product-cell"><span><?php // echo $return_row['isbn']; ?></span></div>	-->
			<div class="product-cell"><span>
					<?php echo date("M d, Y h:m:s a", strtotime($return_row['date_borrowed'])); ?>
				</span></div>
			<?php
			if ($return_row['book_penalty'] != 'No Penalty') {
				echo "<div class='product-cell' class='' style='width:100px;'><span>" . date("M d, Y h:m:s a", strtotime($return_row['due_date'])) . "</span></div>";
			} else {
				echo "<div class='product-cell'><span>" . date("M d, Y h:m:s a", strtotime($return_row['due_date'])) . "</span></div>";
			}

			?>
			<?php
			if ($return_row['book_penalty'] != 'No Penalty') {
				echo "<div class='product-cell' class='' style='width:100px;'><span>" . date("M d, Y h:m:s a", strtotime($return_row['date_returned'])) . "</span></div>";
			} else {
				echo "<div class='product-cell'><span>" . date("M d, Y h:m:s a", strtotime($return_row['date_returned'])) . "</span></div>";
			}

			?>
			<?php
			if ($return_row['book_penalty'] != 'No Penalty') {
				echo "<div class='product-cell' class='alert alert-warning' style='width:100px;'><span>" . $return_row['book_penalty'] . ".00</span></div>";
			} else {
				echo "<div class='product-cell'><span>" . $return_row['book_penalty'] . "</span></div>";
			}

			?>
		</div>

		<?php
	}
	if ($return_count <= 0) {
		echo '
	<div class="products-area-wrapper tableView">
										<div class="products-row">
											<div class="product-cell" style="padding:10px;" class="alert alert-danger"><span>No Books returned at this Date</span></div>
										</div>
									</div>
								';
	}
	?>

</div>
</div>

<!-- content ends here -->
</div>
</div>
</div>
</div>

<?php
//include ('../Common/footer.php'); ?>