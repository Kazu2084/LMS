<?php
include('../Common/user-sidenav-header.php');
include('../Common/header.php'); ?>
<?php
if (isset($_GET['book_id']))
    $id = $_GET['book_id'];
$result1 = mysqli_query($con, "SELECT * FROM book 
               LEFT JOIN category on book.category_id = category.category_id 
               WHERE book_id='$id'");
while ($row = mysqli_fetch_array($result1)) {
    ?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>

    </head>

    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
        <div class="container">
            <div class="app-content">
                <div class="app-content-header">
                    <h1 class="app-content-headerText">
                        Book Information
                    </h1>
                    <a href="book.php" style="background:none;">
                        <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button>
                    </a>
                </div>
                <div></div>
                <br>

                <div class="row">
                    <div class="col-3 ">
                        <?php if ($row['book_image'] != ""): ?>
                            <img src="../Images/<?php echo $row['book_image']; ?>"
                                class="img-fluid mx-auto d-block img-thumbnail" style="position:relative; left:30%;">
                        <?php else: ?>
                            <img src=" ../Images/book_image.jpg" class="img-fluid">
                        <?php endif; ?>
                    </div>

                    <div class="col-5 offset-2 mod-col">
                        <div class="m-3" style="font-size:30px;">Title :
                            <?php echo $row['book_title']; ?>
                        </div>
                        <div class="m-3">Barcode :
                            <?php echo $row['book_barcode']; ?>
                        </div>

                        <div class="m-3" style="word-wrap: break-word; width: 10em;">Author :
                            <?php echo $row['author']; ?>
                        </div>
                        <div class="m-3">ISBN :
                            <?php echo $row['isbn']; ?>
                        </div>
                        <div class="m-3">Publication :
                            <?php echo $row['book_pub']; ?>
                        </div>
                        <div class="m-3">Publisher :
                            <?php echo $row['publisher_name']; ?>
                        </div>
                        <div class="m-3">Copyright :
                            <?php echo $row['copyright_year']; ?>
                        </div>
                        <div class="m-3">Copies :
                            <?php echo $row['book_copies']; ?>
                        </div>
                        <div class="m-3">Category :
                            <?php echo $row['classname']; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <br />
        </div>
</body>

</html>