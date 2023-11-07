<?php 
//include ('../Common/header.php'); ?>

<?php 
// include ('../Common/librarian-sidenav-header.php'); ?>

<?php
include('../Common/librarian-sidenav-header.php');
include('../Common/header.php'); ?>
<div class="app-content">
	<div>
		<h1 class="app-content-headerText">Book Information</h1>
		<a href="book.php" style="background:none;">
							<button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button>
							</a>
	</div>
	<div></div>
	<br />
<!-- 
    <div class="app-content">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Book Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
							<a href="book.php" style="background:none;">
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
<!--                         
                        </ul>
                        <div class="clearfix"></div>
                    </div> -->
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
								
							<thead>
								<tr>
									<th style="width:100px;">Book Image</th>
									<th>Barcode</th>
									<th>Title</th>
									<th>Author/s</th>
									<th>ISBN</th>
									<th>Publication</th>
									<th>Publisher</th>
									<th>Copyright</th>
									<th>Copies</th>
									<th>Category</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
<?php
		if (isset($_GET['book_id']))
		$id=$_GET['book_id'];
		$result1 = mysqli_query($con,"SELECT * FROM book 
		LEFT JOIN category on book.category_id = category.category_id 
		WHERE book_id='$id'");
		while($row = mysqli_fetch_array($result1)){
		?>
							<tr>
								<td>
								<?php if($row['book_image'] != ""): ?>
								<img src="../Images/<?php echo $row['book_image']; ?>" width="150px" height="180px" style="border:4px groove #CCCCCC; border-radius:5px;">
								<?php else: ?>
								<img src="images/book_image.jpg" width="150px" height="180px" style="border:4px groove #CCCCCC; border-radius:5px;">
								<?php endif; ?>
								</td> 
								<td><?php echo $row['book_barcode']; ?></td>
								<td style="word-wrap: break-word; width: 10em;"><?php echo $row['book_title']; ?></td>
								<td style="word-wrap: break-word; width: 10em;"><?php echo $row['author']."<br />".$row['author_2']."<br />".$row['author_3']."<br />".$row['author_4']."<br />".$row['author_5']; ?></td>
								<td><?php echo $row['isbn']; ?></td>
								<td><?php echo $row['book_pub']; ?></td>
								<td><?php echo $row['publisher_name']; ?></td>
								<td><?php echo $row['copyright_year']; ?></td> 
								<td><?php echo $row['book_copies']; ?></td> 
								<td><?php echo $row['classname']; ?></td> 
								<td><?php echo $row['status']; ?></td> 
							</tr>
							<?php } ?>
							</tbody>
							</table>
						</div>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php 
//include ('../Common/footer.php'); ?>

