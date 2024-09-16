<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //
        if (session_status() >= 0) {

            session_start();

            session_unset();

            session_destroy();
            echo "You are now redirected";
        }

        header("refresh: 2; url = index.php");
    ?>
</body>
</html>