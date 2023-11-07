<?php
include('../Common/librarian-sidenav-header.php');
include('../Common/header.php');

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../Styles/grid.js"></script>

</head>

<body>
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
            <div class="app-content-actions-wrapper">
                <div class="filter-button-wrapperfilter jsFilter">
                </div>
                <button class="action-button list active" title="List View">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-list">
                        <line x1="8" y1="6" x2="21" y2="6" />
                        <line x1="8" y1="12" x2="21" y2="12" />
                        <line x1="8" y1="18" x2="21" y2="18" />
                        <line x1="3" y1="6" x2="3.01" y2="6" />
                        <line x1="3" y1="12" x2="3.01" y2="12" />
                        <line x1="3" y1="18" x2="3.01" y2="18" />
                    </svg>
                </button>
                <button class="action-button grid" title="Grid View">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-grid">
                        <rect x="3" y="3" width="7" height="7" />
                        <rect x="14" y="3" width="7" height="7" />
                        <rect x="14" y="14" width="7" height="7" />
                        <rect x="3" y="14" width="7" height="7" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="products-area-wrapper tableView">
            <div class="products-header">
                <div class="product-cell image">Book</div>
                <div class="product-cell category">Title</div>
                <div class="product-cell status-cell">Author</div>
                <div class="product-cell sales">Action</div>
            </div>
            <?php
            $result = mysqli_query($con, "select * from book order by book_id DESC ");
            while ($row = mysqli_fetch_array($result)) {
                $id = $row['book_id'];
                $category_id = $row['category_id'];

                $cat_query = mysqli_query($con, "select * from category where category_id = '$category_id'");
                $cat_row = mysqli_fetch_array($cat_query);
                ?>
                <div class="products-row m-2">
                    <div class="product-cell image">
                        <?php if ($row['book_image'] != ""): ?>
                            <img src="../Images/<?php echo $row['book_image']; ?>" class="img-thumbnail">
                        <?php else: ?>
                            <img src="../Images/book_image.jpg" class="img-thumbnail" width="75px" height="100px">
                        <?php endif; ?>
                        
                    </div>
                    <br>
                    <div class="product-cell category"><span class="cell-label">Title:
                        </span>
                        <?php echo $row['book_title']; ?>
                    </div>
                    <div class="product-cell status-cell">
                        <span class="cell-label">Author:

                        </span>
                        <?php echo $row['author']; ?>
                    </div>
                    <div class="product-cell sales">
                        <a class="btn btn-primary col-3 m-2" for="ViewAdmin"
                            href="view.php<?php echo '?book_id=' . $id; ?>">
                            <i class="fa fa-search"></i>
                        </a>
                        <a class="btn btn-warning col-3 m-2" for="ViewAdmin" href="edit_book.php<?php echo '?book_id=' . $id; ?>">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a class="btn btn-danger col-3 m-2" for="DeleteAdmin" href="#delete<?php echo $id; ?>" data-toggle="modal"
                            data-target="#delete<?php echo $id; ?>">
                            <i class="far fa-trash-alt"></i>
                        </a>
                        
                    </div>
                    <div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel" aria-hidden="true">
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
                                            <a href="delete_book.php<?php echo '?book_id=' . $id; ?>"
                                                style="margin-bottom:5px;" class="btn btn-primary"><i
                                                    class="glyphicon glyphicon-ok icon-white"></i>
                                                Yes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <br>
                </div>
            <?php } ?>
        </div>
    </div>