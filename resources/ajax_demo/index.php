<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ajax Demo</title>
</head>
<body>
    <h1>Enter Here</h1>
    <form method="post">
        <input type="text", name="uname" placeholder="Name">
        <input type="submit" name="submit">
    </form>
    <?php
        if (isset($_POST["submit"])) {
            $name = $_POST["uname"];
            $con = mysqli_connect("localhost", "root", "", "ajax");
            mysqli_query($con, "INSERT INTO user (name) VALUES ('$name')");
        }
    ?>
    <div id = "content"> </content>
 
    <script>
            function load() {
                const xhr = new XMLHttpRequest;
                xhr.open("Get", "process.php", true);
                xhr.onload = function() {
                    document.getElementById("content").innerHTML = this.responseText;
                }
                xhr.send();
            }
            setInterval(function() {
                load();
            }, 1);
    </script>

</body>
</html>