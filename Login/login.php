<!-- PHP Starts Here -->
<?php  
    session_start();
    require_once "../Connection/connection.php"; 
    $message="Email Or Password Does Not Match";
    if(isset($_POST["btnlogin"]))
    {
        $username=$_POST["email"];
        $password=$_POST["password"];

        $_SESSION['email'] = $username;
        $_SESSION['password'] = $password;

        $query="select * from login where user_id='$username' and Password='$password' ";
        $result=mysqli_query($con,$query);
        if (mysqli_num_rows($result)>0) {
            while ($row=mysqli_fetch_array($result)) {
                // if ($row["Role"]=="Admin")
                // {
                //     $_SESSION['LoginAdmin']=$row["user_id"];
                //     header('Location: ../Dashboard/index.php');
                // }
                if ($row["Role"]=="Librarian")
                {
                    $_SESSION['LoginLibrarian']=$row["user_id"];
                    header('Location: ../Librarian/book.php');
                }
                else if ($row["Role"]=="Teacher")
                {
                    $_SESSION['LoginTeacher']=$row["user_id"];
                    header('Location: ../Users/book.php');
                }
                else if($row["Role"]=="Student")
                {
                    $_SESSION['LoginStudent']=$row['user_id'];
                    header('Location: ../Users/book.php');
                }
            }
        }
        else
        { 
            header("Location: login.php");
        }
    }
?>
