<?php
//include('../Common/user-sidenav-header.php');
//include ('../Common/header.php'); ?>
<?php
include('../Common/user-sidenav-header.php');
include('../Common/header.php'); ?>

<?php
$school_number = $_GET['school_number'];

$user_query = mysqli_query($con, "SELECT * FROM user WHERE school_number = '$school_number' ");
$user_row = mysqli_fetch_array($user_query);
?>
<!--        
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title"> -->
<div class="app-content">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Borrow</h1>
	</div>


	<?php
	$sql = mysqli_query($con, "SELECT * FROM user WHERE school_number = '$school_number' ");
	$row = mysqli_fetch_array($sql);
	?>
	<div class="products-area-wrapper tableView">


		<div class="products-header">
			<div class="product-cell">Barcode</div>
			<div class="product-cell">Title</div>
			<div class="product-cell">Author</div>
			<div class="product-cell">ISBN</div>
			<div class="product-cell">Date Borrowed</div>
			<div class="product-cell">Due Date</div>
			<div class="product-cell">Penalty</div>
			<div class="product-cell">Action</div>
			<?php
			$borrow_query = mysqli_query($con, "SELECT * FROM borrow_book
									LEFT JOIN book ON borrow_book.book_id = book.book_id
									WHERE user_id = '" . $user_row['user_id'] . "' && borrowed_status = 'borrowed' ORDER BY borrow_book_id DESC");
			$borrow_count = mysqli_num_rows($borrow_query);
			while ($borrow_row = mysqli_fetch_array($borrow_query)) {
				$due_date = $borrow_row['due_date'];

				$timezone = "Asia/Manila";
				if (function_exists('date_default_timezone_set'))
					date_default_timezone_set($timezone);
				$cur_date = date("Y-m-d H:i:s");
				$date_returned = date("Y-m-d H:i:s");
				//$due_date = strtotime($cur_date);
				//$due_date = strtotime("+3 day", $due_date);
				//$due_date = date('F j, Y g:i a', $due_date);
				///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));
			
				$penalty_amount_query = mysqli_query($con, "select * from penalty order by penalty_id DESC ");
				$penalty_amount = mysqli_fetch_assoc($penalty_amount_query);

				if ($date_returned > $due_date) {
					$penalty = round((float) (strtotime($date_returned) - strtotime($due_date)) / (60 * 60 * 24) * ($penalty_amount['penalty_amount']));
				} elseif ($date_returned < $due_date) {
					$penalty = 'No Penalty';
				} else {
					$penalty = 'No Penalty';
				}
				?>
			</div>

			<div class="products-row">

				<div class='product-cell'><span>
						<?php echo $borrow_row['book_barcode']; ?>
					</span></div>
				<div class="product-cell" style="text-transform: capitalize"><span>
						<?php echo $borrow_row['book_title']; ?>
					</span>
				</div>
				<div class="product-cell" style="text-transform: capitalize"><span>
						<?php echo $borrow_row['author']; ?>
					</span>
				</div>
				<div class='product-cell'><span>
						<?php echo $borrow_row['isbn']; ?>
					</span></div>
				<div class='product-cell'><span>
						<?php echo date("M d, Y h:m:s a", strtotime($borrow_row['date_borrowed'])); ?>
					</span></div>
				<?php
				if ($borrow_row['status'] != 'Hardbound') {
					echo "<div class='product-cell'><span>" . date('M d, Y h:m:s a', strtotime($borrow_row['due_date'])) . "</span></div>";
				} else {
					echo "<div class='product-cell'><span>" . 'Hardbound Book, Inside Only' . "</span></div>";
				}
				?>
				<!---	<div class='product-cell'><span><?php // echo date("M d, Y h:m:s a",strtotime($borrow_row['due_date'])); ?></span></div>	-->
				<?php
				if ($borrow_row['status'] != 'Hardbound') {
					echo "<div class='product-cell'><span>" . $penalty . "</span></div>";
				} else {
					echo "<div class='product-cell'><span>" . 'Hardbound Book, Inside Only' . "</span></div>";
				}
				?>
				<!---	<div class='product-cell'><span><?php // echo $penalty; ?></span></div>	-->
				<div class='products-row'>
					<form method="post" action="">
						<input type="hidden" name="date_returned" class="new_text" id="sd"
							value="<?php echo $date_returned ?>" size="16" maxlength="10" />
						<input type="hidden" name="user_id" value="<?php echo $borrow_row['user_id']; ?>">
						<input type="hidden" name="borrow_book_id" value="<?php echo $borrow_row['borrow_book_id']; ?>">
						<input type="hidden" name="book_id" value="<?php echo $borrow_row['book_id']; ?>">
						<input type="hidden" name="date_borrowed" value="<?php echo $borrow_row['date_borrowed']; ?>">
						<input type="hidden" name="due_date" value="<?php echo $borrow_row['due_date']; ?>">
						<button name="return" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>
							Return</button>
					</form>
				</div>

			</div>

			<?php
			}
			if ($borrow_count <= 0) {
				echo '
									
								<div class="products-area-wrapper tableView">
									<div class="products-row">
											<div class="product-cell" style="padding:10px;" class="alert alert-danger"><span>No books borrowed</span></div>
										</div>
									</div>
								';
			}
			?>
		<?php
		if (isset($_POST['return'])) {
			$user_id = $_POST['user_id'];
			$borrow_book_id = $_POST['borrow_book_id'];
			$book_id = $_POST['book_id'];
			$date_borrowed = $_POST['date_borrowed'];
			$due_date = $_POST['due_date'];
			$date_returned = $_POST['date_returned'];

			$update_copies = mysqli_query($con, "SELECT * from book where book_id = '$book_id' ");
			$copies_row = mysqli_fetch_assoc($update_copies);

			$book_copies = $copies_row['book_copies'];
			$new_book_copies = $book_copies + 1;

			if ($new_book_copies == '0') {
				$remark = 'Not Available';
			} else {
				$remark = 'Available';
			}

			mysqli_query($con, "UPDATE book SET book_copies = '$new_book_copies' where book_id = '$book_id'");
			mysqli_query($con, "UPDATE book SET remarks = '$remark' where book_id = '$book_id' ");

			$timezone = "Asia/Manila";
			if (function_exists('date_default_timezone_set'))
				date_default_timezone_set($timezone);
			$cur_date = date("Y-m-d H:i:s");
			$date_returned_now = date("Y-m-d H:i:s");
			//$due_date = strtotime($cur_date);
			//$due_date = strtotime("+3 day", $due_date);
			//$due_date = date('F j, Y g:i a', $due_date);
			///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));			
		
			$penalty_amount_query = mysqli_query($con, "select * from penalty order by penalty_id DESC ");
			$penalty_amount = mysqli_fetch_assoc($penalty_amount_query);

			if ($date_returned > $due_date) {
				$penalty = round((float) (strtotime($date_returned) - strtotime($due_date)) / (60 * 60 * 24) * ($penalty_amount['penalty_amount']));
			} elseif ($date_returned < $due_date) {
				$penalty = 'No Penalty';
			} else {
				$penalty = 'No Penalty';
			}

			mysqli_query($con, "UPDATE borrow_book SET borrowed_status = 'returned', date_returned = '$date_returned_now', book_penalty = '$penalty' WHERE borrow_book_id= '$borrow_book_id' and user_id = '$user_id' and book_id = '$book_id' ");

			mysqli_query($con, "INSERT INTO return_book (user_id, book_id, date_borrowed, due_date, date_returned, book_penalty)
									values ('$user_id', '$book_id', '$date_borrowed', '$due_date', '$date_returned', '$penalty')");

			// $report_history1=mysqli_query($con,"select * from user where user_id = $id_session ") or die (mysqli_error());
			// $report_history_row1=mysqli_fetch_array($report_history1);
			// $admin_row1=$report_history_row1['firstname']." ".$report_history_row1['middlename']." ".$report_history_row1['lastname'];	
		
			// mysqli_query($con,"INSERT INTO report 
			// (book_id, user_id, admin_name, detail_action, date_transaction)
			// VALUES ('$book_id','$user_id','$admin_row1','Returned Book',NOW())");
		
			?>
			<script>
				window.location = "borrow_book.php?school_number=<?php echo $school_number ?>";
			</script>
			<?php
		}
		?>

	</div>


	<div class="row" style="margin-top:30px;">
		<form method="post">
			<div class="col-xs-4">
				<input type="text" style="margin-bottom:10px; " class="form-control" name="barcode"
					placeholder="Enter barcode here....." autofocus required />
			</div>
		</form>
		<div class="products-area-wrapper tableView">
			<form method="post" action="">
				<div class="products-header">
					<div class='product-cell' style="width:100px;"><span>Book Image</span></div>
					<div class="product-cell"><span>Barcode</span></div>
					<div class="product-cell"><span>Title</span></div>
					<div class="product-cell"><span>Author</span></div>
					<div class="product-cell"><span>ISBN</span></div>
					<div class="product-cell"><span>Action</span></div>
				</div>
				<?php
				if (isset($_POST['barcode'])) {
					$barcode = $_POST['barcode'];

					$book_query = mysqli_query($con, "SELECT * FROM book WHERE book_barcode = '$barcode' ");
					$book_count = mysqli_num_rows($book_query);
					$book_row = mysqli_fetch_array($book_query);

					if ($book_row['book_barcode'] != $barcode) {
						echo '
		<div class="products-area-wrapper tableView">
		<div class="products-row">													<div class="product-cell" class="alert alert-info"><span>No match for the barcode entered!</span></div>
												</div>
											</div>
										';
					} elseif ($barcode == '') {
						echo '
		<div class="products-area-wrapper tableView">
		<div class="products-row">													<div class="product-cell" class="alert alert-info"><span>Enter the correct details!</span></div>
												</div>
											</div>
										';
					} else {
						?>
						<div class="products-row">
							<input type="hidden" name="user_id" value="<?php echo $user_row['user_id'] ?>">
							<input type="hidden" name="book_id" value="<?php echo $book_row['book_id'] ?>">

							<div class='product-cell'><span>
									<?php if ($book_row['book_image'] != ""): ?>
										<img src="../Images/<?php echo $book_row['book_image']; ?>" width="100px" height="100px"
											style="border:4px groove #CCCCCC; border-radius:5px;">
									<?php else: ?>
										<img src="../Images/book_image.jpg" width="150px" height="180px"
											style="border:4px groove #CCCCCC; border-radius:5px;">
									<?php endif; ?>
								</span></div>
							<div class='product-cell'><span>
									<?php echo $book_row['book_barcode'] ?>
								</span></div>
							<div class="product-cell" style="text-transform: capitalize"><span>
									<?php echo $book_row['book_title'] ?>
								</span>
							</div>
							<div class="product-cell" style="text-transform: capitalize"><span>
									<?php echo $book_row['author'] ?>
								</span>
							</div>
							<div class='product-cell'><span>
									<?php echo $book_row['isbn'] ?>
								</span></div>
							<!-- <div class='product-cell'><span>
								<?php //echo $book_row['status'] ?>
							</span></div> -->
							<div class='product-cell'><span><button name="borrow" class="btn btn-info"><i
											class="fa fa-check"></i>
										Borrow</button></span></div>
						</div>
					<?php }
				} ?>

				<?php

				$allowable_days_query = mysqli_query($con, "select * from allowed_days order by allowed_days_id DESC ");
				$allowable_days_row = mysqli_fetch_assoc($allowable_days_query);

				$timezone = "Asia/Manila";
				if (function_exists('date_default_timezone_set'))
					date_default_timezone_set($timezone);
				$cur_date = date("Y-m-d H:i:s");
				$date_borrowed = date("Y-m-d H:i:s");
				$due_date = strtotime($cur_date);
				$due_date = strtotime("+" . $allowable_days_row['no_of_days'] . " day", $due_date);
				$due_date = date('Y-m-d H:i:s', $due_date);
				///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));
				?>
				<input type="hidden" name="due_date" class="new_text" id="sd" value="<?php echo $due_date ?>" size="16"
					maxlength="10" />
				<input type="hidden" name="date_borrowed" class="new_text" id="sd" value="<?php echo $date_borrowed ?>"
					size="16" maxlength="10" />

				<?php
				if (isset($_POST['borrow'])) {
					$user_id = $_POST['user_id'];
					$book_id = $_POST['book_id'];
					$date_borrowed = $_POST['date_borrowed'];
					$due_date = $_POST['due_date'];

					$trapBookCount = mysqli_query($con, "SELECT count(*) as books_allowed from borrow_book where user_id = '$user_id' and borrowed_status = 'borrowed'");

					$countBorrowed = mysqli_fetch_assoc($trapBookCount);

					$bookCountQuery = mysqli_query($con, "SELECT count(*) as book_count from borrow_book where user_id = '$user_id' and borrowed_status = 'borrowed' and book_id = $book_id");

					$bookCount = mysqli_fetch_assoc($bookCountQuery);

					$allowed_book_query = mysqli_query($con, "select * from allowed_book order by allowed_book_id DESC ");
					$allowed = mysqli_fetch_assoc($allowed_book_query);

					if ($countBorrowed['books_allowed'] == $allowed['qntty_books']) {
						echo "<script>alert(' " . $allowed['qntty_books'] . " " . 'Books Allowed per User!' . " '); window.location='borrow_book.php?school_number=" . $school_number . "'</script>";
					} elseif ($bookCount['book_count'] == 1) {
						echo "<script>alert('Book Already Borrowed!'); window.location='borrow_book.php?school_number=" . $school_number . "'</script>";
					} else {

						$update_copies = mysqli_query($con, "SELECT * from book where book_id = '$book_id' ");
						$copies_row = mysqli_fetch_assoc($update_copies);

						$book_copies = $copies_row['book_copies'];
						$new_book_copies = $book_copies - 1;

						if ($new_book_copies < 0) {
							echo "<script>alert('Book out of Copy!'); window.location='borrow_book.php?school_number=" . $school_number . "'</script>";
						} elseif ($copies_row['status'] == 'Damaged') {
							echo "<script>alert('Book Cannot Borrow At This Moment!'); window.location='borrow_book.php?school_number=" . $school_number . "'</script>";
						} elseif ($copies_row['status'] == 'Lost') {
							echo "<script>alert('Book Cannot Borrow At This Moment!'); window.location='borrow_book.php?school_number=" . $school_number . "'</script>";
						} else {

							if ($new_book_copies == '0') {
								$remark = 'Not Available';
							} else {
								$remark = 'Available';
							}

							mysqli_query($con, "UPDATE book SET book_copies = '$new_book_copies' where book_id = '$book_id' ");
							mysqli_query($con, "UPDATE book SET remarks = '$remark' where book_id = '$book_id' ");

							mysqli_query($con, "INSERT INTO borrow_book(user_id,book_id,date_borrowed,due_date,borrowed_status)
									VALUES('$user_id','$book_id','$date_borrowed','$due_date','borrowed')");

							// $report_history=mysqli_query($con,"select * from user where user_id = $id_session");
							// $report_history_row=mysqli_fetch_array($report_history);
							// $admin_row=$report_history_row['firstname']." ".$report_history_row['middlename']." ".$report_history_row['lastname'];	
				
							// mysqli_query($con,"INSERT INTO report 
							// (book_id, user_id, admin_name, detail_action, date_transaction)
							// VALUES ('$book_id','$user_id','$admin_row','Borrowed Book',NOW())");
				
						}
					}
					?>
					<script>
						window.location = "borrow_book.php?school_number=<?php echo $school_number ?>";
					</script>
					<?php
				}
				?>
			</form>
		</div>
	</div>
	<!-- </div>
	</div>
</div> -->


	<!-- content ends here -->


	<?php include('../Common/footer.php'); ?>