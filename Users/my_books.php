<?php
include('../Common/user-sidenav-header.php');
include('../Common/header.php'); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../Styles/grid.js"></script>

</head>

<body>
    <div class="app-content">
        <div class="app-content-header">
            <h1 class="app-content-headerText">My Books</h1>
            <div class="app-content-actions">
            <div class="app-content-actions-wrapper">
                <div class="filter-button-wrapperfilter jsFilter">
                </div>
                </div>
        </div>
        </div>
<br>
        <div class="products-area-wrapper tableView">
        
                    <?php
                    $where = "";


                    $return_query = mysqli_query($con, "SELECT * from book, borrow_book, login, user
							WHERE borrow_book.user_id = login.ID AND login.ID = user.user_id
							AND borrow_book.borrowed_status = 'borrowed'") or die(mysqli_error());
                    $return_count = mysqli_num_rows($return_query);

                    

                    if ($return_count > 0) {
                        echo '<div class="products-header">';
                        echo '<div class="product-cell">Image</div>';
                        echo '<div class="product-cell">Title</div>';
                        echo '<div class="product-cell">Author</div>';
                        echo '</div>';
                        while ($return_row = mysqli_fetch_array($return_query)) {
                            $id = $return_row['book_id'];
                            echo '<div class="products-row">';
                            echo '<div class="product-cell"><span>' . $return_row['book_image'] . '</span></div>';
                            echo '<div class="product-cell" style="text-transform: capitalize">' . $return_row['book_title'] . '</div>';
                            echo '<div class="product-cell" style="text-transform: capitalize">' . $return_row['author'] . '</div>';
                            echo '</div>';
                        }
                    }
                    ?>
                            </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>