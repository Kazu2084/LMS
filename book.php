<?php
//include('../Common/librarian-sidenav-header.php');
// include ('../Common/header.php'); 
?>
<!-- <head>
   Include the Font Awesome CSS 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
</head> -->

<!-- 
<div class="clearfix"></div>
<div class="app-content"> -->
<!-- <div class="app-content-header">
        <h1 class="app-content-headerText">Books</h1>
    </div> -->

<head>
    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="grid.css">
</head>
<meta name"viewport"
    content="width=device-width, user-scalable=no, initial=scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
<?php
//include('Common/librarian-sidenav-header.php');
include('Connection/connection.php');
//include('Common/header.php'); ?>
<div class="app-content">
    <div class="app-content-header">
        <h1 class="app-content-headerText">Books</h1>
        <a href="add_book.php" style="background:none; position:relative; left:375px">
            <button class="btn btn-primary"><i class="fa fa-plus"></i> Add Book</button>
        </a>
        <a href="book_print.php" target="_blank" style="background:none;">
            <button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print Books List</button>
        </a>

    </div>

    <div class="app-content-actions">
        <!-- <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel"> -->

        <!-- <a href="print_barcode1.php" target="_blank" style="background:none;">
                    <button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print Books Barcode</button>
                </a> -->
        <br />
        <br />
        <!-- <div class="x_title">
                    <h2>Book List</h2> -->
        <!-- <ul class="nav navbar-right panel_toolbox">
                        <li>
                           
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
        <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div> -->
        <!-- <ul class="nav nav-pills">
                        <li role="presentation" class="active"><a href="book.php">All</a></li>
                        <li role="presentation"><a href="new_books.php">New Books</a></li>
                        <li role="presentation"><a href="old_books.php">Old Books</a></li>
                        <li role="presentation"><a href="lost_books.php">Lost Books</a></li>
                        <li role="presentation"><a href="damage_books.php">Damaged Books</a></li>
                        <li role="presentation"><a href="sub_rep.php">Subject for Replacement Books</a></li>
                        <li role="presentation"><a href="hard_bound.php">Hardbound Books</a></li>
                    </ul> -->
        <!-- <div class="clearfix"></div> -->
        <!-- </div>
                <div class="x_content"> -->
        <!-- content starts here -->
        <!-- <caption>Book List</caption> -->
        <!-------------------------------------------------------------->

        <!-------------------------------------------------->
        <!-- <div class="table-responsive">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

                <thead>
                    <tr>
                        <th style="width:100px;">Book Image</th>
                        <th>Barcode</th>
                        <th>Title</th>
                        <th>ISBN</th>
                        <th>Author/s</th>
                        <th>Copies</th>
                        <th>Category</th>--->
        <!-- <th>Status</th>
                                    <th>Remarks</th> -->
        <!-- <th>Action</th>
                    </tr>
                </thead>
                <tbody> -->
        <!-- <div id="div1">
            <section class="section-grid">
                <div class="grid-prod">
                    <div class="prod-grid"><img
                            src="https://target.scene7.com/is/image/Target/GUEST_af73fcc6-3cc7-42bc-878e-4e7e1a073e06?wid=488&hei=488&fmt=pjpeg">
                        <h3>Ph'nglui mglw'nafh. </h3>
                        <p>Ph'nglui mglw'nafh Cthulhu R'lyeh wgah'nagl fhtagn. </p>
                        <button class="btn"> Buy <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                    </div>
                </div>
            </section>
        </div> -->
        <div class="container">
        <div id="div1">
        <section class="section-grid">
        <?php
        $result = mysqli_query($con, "select * from book order by book_id DESC ");
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['book_id'];
            $category_id = $row['category_id'];

            $cat_query = mysqli_query($con, "select * from category where category_id = '$category_id'");
            $cat_row = mysqli_fetch_array($cat_query);
            ?>
            <div class="prod-grid">

                <?php if ($row['book_image'] != ""): ?>
                    <img src="Images/<?php echo $row['book_image']; ?>">
                <?php else: ?>
                    <img src="images/book_image.jpg" class="img-thumbnail" width="75px" height="50px">
                <?php endif; ?>

                <!--- either this <td><a target="_blank" href="view_book_barcode.php?code=<?php // echo $row['book_barcode']; ?>"><?php // echo $row['book_barcode']; ?></a></td> -->
                <!-- <td><a target="_blank" href="print_barcode_individual1.php?code=<?php //echo $row['book_barcode']; ?>"><?php //echo $row['book_barcode']; ?></a></td> -->
                <h3 style="word-wrap: break-word; width: 10em;">
                    <?php echo $row['book_title']; ?>
                </h3>
                <!-- <td style="word-wrap: break-word; width: 10em;">
                    <?php //echo $row['isbn']; ?>
                </td> -->
                <p style="word-wrap: break-word; width: 10em;">
                    <?php echo $row['author'] . "<br />" . $row['author_2']; ?>
                </p>
                <!-- <td>
                    <?php //echo $row['book_copies']; ?>
                </td> -->
                <!-- <td>
                    <?php //echo $cat_row['classname']; ?>
                </td> -->
                <!-- <td>
                                            <?php
                                            //echo $row['status']; ?>
                                        </td>
                                        <td>
                                            <?php
                                            //echo $row['remarks']; ?>
                                        </td> -->
                <button class="btn">
                    <a class="btn btn-primary" for="ViewAdmin" href="view_book.php<?php echo '?book_id=' . $id; ?>">
                        <i class="fa fa-search"></i>
                    </a>
                    <a class="btn btn-warning" for="ViewAdmin" href="edit_book.php<?php echo '?book_id=' . $id; ?>">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-danger" for="DeleteAdmin" href="#delete<?php echo $id; ?>" data-toggle="modal"
                        data-target="#delete<?php echo $id; ?>">
                        <i class="far fa-trash-alt"></i>
                    </a>
                    <!-- <a class="btn btn-danger" for="DeleteAdmin" href="#delete<?php //echo $id;?>" data-toggle="modal" data-target="#delete<?php //echo $id;?>">
                                        <i class="far fa-trash-alt"></i>
                                </a> -->
                </button>
            </div>
                </div>
            </section>
    </div>
                </div>
            <!-- delete modal user -->
            <div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel"><i
                                                                    class="glyphicon glyphicon-user"></i> User</h4>
                                                        </div> -->
                        <div class="modal-body">
                            <div class="alert alert-danger">
                                Are you sure you want to delete?
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i
                                        class="glyphicon glyphicon-remove icon-white"></i>
                                    No</button>
                                <a href="delete_book.php<?php echo '?book_id=' . $id; ?>" style="margin-bottom:5px;"
                                    class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i>
                                    Yes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    <!-- </td>
    </tr> -->
<?php } ?>
<!-- </tbody>
</table> -->

</div>

<!-- content ends here -->
</div>
</div>
</div>
</div>
</div>

<?php
// include ('../Common/footer.php'); 
?>