<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (session_status() >= 0){
            if(isset($_SESSION["uname"])) {
                header("refresh: 0.5; url = home.php");
            }
        }
        if (isset($_POST["submit"])){
            $uname =$_POST["uname"] ;
            $pass = $_POST["pass"];

            $conn = mysqli_connect('localhost', 'root', '', 'app_users');
            $sql = "SELECT *FROM records WHERE username = '$uname' and password = '$pass'";

            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            if ($count == 1) {
                session_start();
                
                $_SESSION["uname"] = $uname;

                echo "You are now redirected";
                header("refresh: 2; url = home.php");
                exit();
            }
            else{
                echo "Account doesnt exist. Please try again";
                header("refresh: 2; url = index.php");
                exit();
            }
        }
        if (!isset($_POST["submmit"])){
            echo "Fill the username and password."."<br>";
            header("refresh: 2; url = index.php");
        }
    ?>
</body>
</html>