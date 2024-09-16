<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="/Book-Borrowing-System/assets/css/styles.css?v=<?php echo time(); ?>">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="index-body">
    <div>
        <div class="form-section">
            <div class="form-container">
                <h3>User Login</h3>
                <form action="loginprocess.php" class="form" method="post">
                    <div class="input-box">
                        <label for="">Username</label>
                        <input type="text" placeholder="Username" name="uname" >
                    </div>
                    <div class="input-box">
                        <label for="">Password</label>
                        <input type="text" placeholder="Password" name="pass" >
                    </div>

                    <button type="submit" name="submit" value="Set">Login</button>
                </form>
                <div>
                    <a class="forget-link" href="verificationpage.php">Forget password</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>