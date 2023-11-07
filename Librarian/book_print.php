<?php
include('../Connection/connection.php');
include('../Common/header.php');
?>
<html>

<head>
    <title>Library Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


    <style>
        .container {
            width: 100%;
            margin: auto;
        }

        .table {
            width: 100%;
            margin-bottom: 20px;
        }

        .table-striped tbody>tr:nth-child(odd)>td,
        .table-striped tbody>tr:nth-child(odd)>th {
            background-color: #f9f9f9;
        }

        @media print {
            #print {
                display: none;
            }
        }

        #print {
            width: 90px;
            height: 30px;
            font-size: 18px;
            background: white;
            border-radius: 4px;
            margin-left: 28px;
            cursor: hand;
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
        <div class="container">
        <div id="header">
            <br />
            
                <h1 class="m-20 p-10 text-center">Library Management System</h1>
           
            
            
            <div class="float-end">
                <b style="color:blue;">Date Prepared:</b>
                <?php include('currentdate.php'); ?>
            </div>
            
            <br />
            <br />
            <?php
            $result = mysqli_query($con, "select * from book 
							LEFT JOIN category ON book.category_id = category.category_id 
							order by book.book_id DESC ") or die(mysqli_error());
            ?>
           <p style="font-size:14pt; font-weight:bold;" class="m-2 float-start">Book
                List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </p>
            <button class="float-end" type="submit" id="print" onclick="printPage()">Print</button>
            <table class="table table-responsive center table-bordered py-10 my-10">
            
                <thead>
                    <tr>
                    <tr>
                        <th>Barcode</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>ISBN</th>
                        <th>Publication</th>
                        <th>Publisher</th>
                        <th>Copyright</th>
                        <th>Copies</th>
                        <th>Category</th>
                        <th>Status</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        $id = $row['book_id'];
                        $category_id = $row['category_id'];
                        ?>
                        <tr>
                            <td>
                                <?php echo $row['book_barcode']; ?>
                            </td>
                            <td>
                                <?php echo $row['book_title']; ?>
                            </td>
                            <td>
                                <?php echo $row['author']; ?>
                            </td>
                            <td>
                                <?php echo $row['isbn']; ?>
                            </td>
                            <td>
                                <?php echo $row['book_pub']; ?>
                            </td>
                            <td>
                                <?php echo $row['publisher_name']; ?>
                            </td>
                            <td>
                                <?php echo $row['copyright_year']; ?>
                            </td>
                            <td>
                                <?php echo $row['book_copies']; ?>
                            </td>
                            <td>
                                <?php echo $row['classname']; ?>
                            </td>
                            <td>
                                <?php echo $row['status']; ?>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>

            <br />
            <br />
            <?php
            // include('../Connection/connection.php');
            // include('session.php');
            // $user_query = mysqli_query($con, "select * from admin where admin_id='$id_session'") or die(mysqli_error());
            // $row = mysqli_fetch_array($user_query); {
            //     ?>
            <!-- //     <h2><i class="glyphicon glyphicon-user"></i>
            //         <?php 
            // echo '<span style="color:blue; font-size:15px;">Prepared by:' . "<br /><br /> " . $row['firstname'] . " " . $row['lastname'] . " " . '</span>'; ?>
            //     </h2> -->
            <?php
        //  } ?>


        </div>


        </div>


    </div>
</body>


</html>