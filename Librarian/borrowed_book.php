<?php 
//include ('../Common/header.php'); ?>
<?php 
include('../Common/librarian-sidenav-header.php');
include('../Common/header.php'); ?>
<div class="app-content">
	<div>
		<h1 class="app-content-headerText">Borrowed Books</h1>
	</div>
    <div></div>
    <br/>

        <!-- <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title"> -->
	<div class="col-xs-3">
		<form method="POST" action="sort_borrowed_book.php">
		<input type="date" class="form-control" style="width:200px; float:right;" name="sort" value="<?php echo date('Y-m-d'); ?>">
		<button type="submit" class="btn btn-primary btn-outline" style="float:right;" name="ok"><i class="fa fa-calendar-o"></i> Sort By Date Borrowed</button>
		</form>
	</div>
					<?php 
					$count = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `borrow_book`")) or die(mysqli_error());
					$count1 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `borrow_book` WHERE `borrowed_status` = 'borrowed'")) or die(mysqli_error());
					$count2 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `borrow_book` WHERE `borrowed_status` = 'returned'")) or die(mysqli_error());
					?>
						<div>
						<!---	<a href="borrowed_book.php"><button class="btn btn-primary"><i class="fa fa-info"></i> All Records (<?php /// echo $count['total']; ?>)</button></a> -->
							<a href="borrowed.php"><button style="float:left; margin-left:50%;"class="btn btn-success btn-outline">Borrowed Books (<?php echo $count1['total']; ?>)</button></a>
							<a href="returned.php"><button style="float:left; margin-left:70%;"class="btn btn-danger btn-outline">Returned Books (<?php echo $count2['total']; ?>)</button></a>
</div>
                        <!-- <ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li> -->
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
                    <!-- </div>
                    <div class="x_content"> -->
                        <!-- content starts here -->
						
			
<div class="products-area-wrapper tableView">
<div class="products-header">
									<div class="product-cell">Barcode</div>
									<div class="product-cell">Borrower Name</div>
									<div class="product-cell">Title</div>
									<div class="product-cell">Date Borrowed</div>
									<div class="product-cell">Due Date</div>
									<div class="product-cell">Date Returned</div>
									<div class="product-cell">Status</div>
									</div>
						
							<?php
								$borrow_query = mysqli_query($con,"SELECT * FROM borrow_book
									LEFT JOIN book ON borrow_book.book_id = book.book_id 
									LEFT JOIN user ON borrow_book.user_id = user.user_id 
									WHERE borrowed_status = 'borrowed'
									ORDER BY borrow_book.borrow_book_id DESC") or die(mysqli_error());
								$borrow_count = mysqli_num_rows($borrow_query);
								while($borrow_row = mysqli_fetch_array($borrow_query)){
									$id = $borrow_row ['borrow_book_id'];
									$book_id = $borrow_row ['book_id'];
									$user_id = $borrow_row ['user_id'];
							?>
							<div class="products-row">
								<div class="product-cell"><span><?php echo $borrow_row['book_barcode']; ?></span></div>
								<div class="product-cell" style="text-transform: capitalize"><span><?php echo $borrow_row['firstname']." ".$borrow_row['lastname']; ?></span></div>
								<div class="product-cell" style="text-transform: capitalize"><span><?php echo $borrow_row['book_title']; ?></span></div>
								<div class="product-cell"><span><?php echo date("M d, Y h:m:s a",strtotime($borrow_row['date_borrowed'])); ?></span></div>
								<div class="product-cell"><span><?php echo date("M d, Y h:m:s a",strtotime($borrow_row['due_date'])); ?></span></div>
								<div class="product-cell"><span><?php echo ($borrow_row['date_returned'] == "0000-00-00 00:00:00") ? "Pending" : date("M d, Y h:m:s a",strtotime($borrow_row['date_returned'])); ?></span></div>
								<?php
									if ($borrow_row['borrowed_status'] != 'returned') {
										echo "<div class='product-cell' class='alert alert-success'><span>".$borrow_row['borrowed_status']."</span></div>";
									} else {
										echo "<div class='product-cell'  class='alert alert-danger'><span>".$borrow_row['borrowed_status']."</span></div>";
									}
								?>
							</div>
							<?php } 
							if ($borrow_count <= 0){
								echo '
								<div class="products-area-wrapper tableView">
										<div class="products-row">
											<div class="product-cell" style="padding:10px;" class="alert alert-danger"><span>No Books returned at this moment</span></div>
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