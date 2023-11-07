<?php include ('../Connection/connection.php');

?>
<html>

<head>
		<title>Library Management System</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

		<style>
		
		
.container {
	width:100%;
	margin:auto;
}
		
.table {
    width: 100%;
    margin-bottom: 20px;
}	 

.table-striped tbody > tr:nth-child(odd) > td,
.table-striped tbody > tr:nth-child(odd) > th {
    background-color: #f9f9f9;
}
@media print{
#print {
display:none;
}
}

#print {
	width: 90px;
    height: 30px;
    font-size: 18px;
    background: white;
    border-radius: 4px;
	margin-left:28px;
	cursor:hand;
}
		
		</style>
<script>
function printPage() {
    window.print();
}
</script>
		
</head>


<body>
<div style="width: 100%;overflow:auto;">
	<div class = "container">
		<div id = "header">
		<br/>
		<h1 class="m-20 p-10 text-center">Library Management System</h1>
<button class="float-end" type="submit" id="print" style="float:right;" onclick="printPage()">Print</button>
        <div class="float-end">
		<b style="color:blue;">Date Prepared:</b>
		<?php include('currentdate.php'); ?>
        </div>			
    <?php //include('session.php');
	session_start();
	if (!isset($_SESSION['id'])){
	//header('location:book.php');
	} ?>
		<br/>
<?php 
include ('../Connection/connection.php');
							$return_query= mysqli_query($con,"select * from return_book 
							LEFT JOIN book ON return_book.book_id = book.book_id 
							LEFT JOIN user ON return_book.user_id = user.user_id 
							where return_book.date_returned BETWEEN '".$_SESSION['datefrom']." 00:00:01' and '".$_SESSION['dateto']." 23:59:59' 
							order by return_book.return_book_id DESC");
							$return_count = mysqli_num_rows($return_query);
								
							$count_penalty = mysqli_query($con,"SELECT sum(book_penalty) FROM return_book 
							where return_book.date_returned BETWEEN '".$_SESSION['datefrom']." 00:00:01' and '".$_SESSION['dateto']." 23:59:59'  ")or die(mysqli_error());
							$count_penalty_row = mysqli_fetch_array($count_penalty);
							
?>
            <table class="table table-responsive center table-bordered py-10 my-10">
                                <div class="pull-left">
                                    <div class="span"><div><i class="icon-credit-card icon-large"></i>&nbsp;Date: From&nbsp;<?php echo date("M d, Y",strtotime($_SESSION['datefrom'])); ?> To&nbsp;<?php echo date("M d, Y",strtotime($_SESSION['dateto'])); ?></div></div>
                                </div>
								<br />
                                <div class="pull-left">
                                    <div class="span"><div><i class="icon-credit-card icon-large"></i>&nbsp;Total Amount of Penalty:&nbsp;<?php echo $count_penalty_row['sum(book_penalty)'].".00"; ?></div></div>
                                </div>
								<br />
						  <thead>
								<tr>
									<th>Barcode</th>
									<th>Borrower Name</th>
									<th>Level</th>
									<th>Section</th>
									<th>Title</th>
								<!---	<th>Author</th>
									<th>ISBN</th>	-->
									<th>Date Borrowed</th>
									<th>Due Date</th>
									<th>Date Returned</th>
									<th>Penalty</th>
								</tr>
						  </thead>   
						  <tbody>
<?php
							while ($return_row= mysqli_fetch_array ($return_query) ){
							$id=$return_row['return_book_id'];
?>
							<tr>
								<td style="text-align:center;"><?php echo $return_row['book_barcode']; ?></td>
								<td style="text-transform: capitalize; text-align:center;"><?php echo $return_row['firstname']." ".$return_row['middlename']." ".$return_row['lastname']; ?></td>
								<td style="text-transform: capitalize; text-align:center;"><?php echo $return_row['level']; ?></td>
								<td style="text-transform: capitalize; text-align:center;"><?php echo $return_row['section']; ?></td>
								<td style="text-transform: capitalize; text-align:center;"><?php echo $return_row['book_title']; ?></td>
							<!---	<td style="text-transform: capitalize"><?php // echo $return_row['author']; ?></td>
								<td><?php // echo $return_row['isbn']; ?></td>	-->
								<td style="text-align:center;"><?php echo date("M d, Y h:m:s a",strtotime($return_row['date_borrowed'])); ?></td>
								<?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='' style='width:100px; text-align:center;'>".date("M d, Y h:m:s a",strtotime($return_row['due_date']))."</td>";
								 }else {
									 echo "<td style='text-align:center;'>".date("M d, Y h:m:s a",strtotime($return_row['due_date']))."</td>";
								 }
								
								?>
								<?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='' style='width:100px; text-align:center;'>".date("M d, Y h:m:s a",strtotime($return_row['date_returned']))."</td>";
								 }else {
									 echo "<td style='text-align:center;'>".date("M d, Y h:m:s a",strtotime($return_row['date_returned']))."</td>";
								 }
								
								?>
								<?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td style='width:100px; text-align:center;'>".$return_row['book_penalty'].".00</td>";
								 }else {
									 echo "<td style='text-align:center;'>".$return_row['book_penalty']."</td>";
								 }
								
								?>
							</tr>
							
							
							<?php 
							}
							if ($return_count <= 0){
								echo '
								<table class="table table-responsive center table-bordered py-10 my-10">										<tr>
											<td style="padding:10px;" class="float:start;">No Books returned at this Date</td>
										</tr>
									</table>
								';
							} 							
							?>
							</tr>  
						  </tbody> 
					  </table> 

<br />
<br />
							<?php
								// include('../Connection/connection.php');
								// $user_query=mysqli_query($con,"select * from admin where admin_id='$id_session'");
								// $row=mysqli_fetch_array($user_query); {
							?>        
							<!-- <h2><i class="glyphicon glyphicon-user"></i> <?php //echo '<span style="color:blue; font-size:15px;">Prepared by:'."<br /><br /> ".$row['firstname']." ".$row['lastname']." ".'</span>';?></h2> -->
								<?php //} ?>


			</div>
	
	
	
	

	</div>
</body>


</html>