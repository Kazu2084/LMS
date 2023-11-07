<?php 
//include('../Common/user-sidenav-header.php');
//include ('../Common/header.php'); ?>

<?php
include('../Common/user-sidenav-header.php');
include('../Common/header.php'); ?>
<div class="app-content">
    <div class="app-content-header">
        <h1 class="app-content-headerText">Borrow Book</h1>
    </div>
    <br>
<!--        
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <ul class="nav navbar-right panel_toolbox"> -->
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
                        <div class="clearfix"></div>
                    </div> -->
                    <!-- <div class="x_content"> -->
                        <!-- content starts here -->

<div class="container-fluid">
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
	
						<form method="post" action="">
                                        <!-- <select name="school_number" class="select2_single form-control" required="required" tabindex="-1" >
										<option value="0">Select College ID Number</option> -->
                                        <div class="form-group">
                                    <label class="control-label col-md-10" name="school_number">Enter your College ID <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-15">
                                        <input type="text" name="school_number"  id="school_number" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
										<?php
										// $result= mysqli_query($con,"select * from user where status = 'Active' ") or die (mysqli_error());
										// while ($row= mysqli_fetch_array ($result) ){
										// $id=$row['user_id'];
										// ?>
                                             <!-- <option value="<?php //echo $row['school_number']; ?>"><?php //echo $row['school_number']; ?> - <?php //echo $row['firstname']; ?></option> -->
										 <?php  ?>
                                        <!-- </select> -->
				
						<button name="submit" type="submit" class="btn btn-primary" style="margin-left:60px;"><i class="glyphicon glyphicon-log-in"></i> Submit</button>
						</form>

<?php
	include ('../Connection/connection.php');

	if (isset($_POST['submit'])) {

	$school_number = $_POST['school_number'];

	$sql = mysqli_query($con,"SELECT * FROM user WHERE school_number = '$school_number' ");
	$count = mysqli_num_rows($sql);
	$row = mysqli_fetch_array($sql);

		if($count <= 0){
			echo "<div class='alert alert-success'>".'No match found for the School ID Number'."</div>";
		}else{
			$school_number = $_POST['school_number'];
			echo ('<script> location.href="borrow_book.php?school_number='.$school_number.'";</script');
		}
	}
?>

	</div>
	<div class="col-md-4"></div>
</div>
</div>			
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('../Common/footer.php'); ?>