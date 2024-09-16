<?php
// Start session
session_start();

// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'app_users');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$verification_error = '';
$password_updated = '';
$verified = false; // Default value to false
$username = 'tahsin@gmail.com'; // The username for which the pet name is being retrieved.
$user_id = 1;

// Fetch pet name (security question answer) from the database for the given username
$query = "SELECT sqanswer FROM records WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$pet_name = $row['sqanswer']; // The correct pet name from the database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle pet name verification
    if (isset($_POST['verify'])) {
        $entered_pet_name = $_POST['pet_name'];

        if ($entered_pet_name === $pet_name) {
            $_SESSION['verified'] = true; // Set session value to maintain verification status
            $verified = true;
        } else {
            $_SESSION['verified'] = false; // Reset session value if verification fails
            $verified = false;
            $verification_error = 'Incorrect pet name. Please try again.';
        }
    }

    // Handle password update after verification
    if (isset($_POST['update_password']) && isset($_SESSION['verified']) && $_SESSION['verified']) {
        $new_password = $_POST['new_password'];

        // Ensure the new password is not empty
        if (empty($new_password)) {
            $password_updated = 'New password cannot be empty!';
        } else {
            // Hash the new password for security before storing in the database
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update the password in the database
            $update_query = "UPDATE records SET password = ? WHERE id = ?";
            $update_stmt = $conn->prepare($update_query);
            $update_stmt->bind_param("si", $new_password, $user_id);

            if ($update_stmt->execute()) {
                echo "Password updated!";
                header("refresh: 1; url = index.php");
            } else {
                $password_updated = 'Failed to update password. Error: ' . $conn->error;
            }
        }
    }
}

// Close statement and connection
$stmt->close();
$conn->close();
?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="/Book-Borrowing-System/assets/css/verificationstyles.css?v=<?php echo time(); ?>">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="verify-body">
    <div class="form-section">
        <div class="form-container">


            <!-- Show verification form if not verified -->
            <?php if (!isset($verified) || !$verified): ?>
                <form class="form" method="POST">
                <h3>Verification</h3>
                    <div class="input-box">
                        <label for="pet_name">What is your pet's name?</label>
                        <input type="text" name="pet_name" id="pet_name" required>
                        <button type="submit" name="verify">Verify</button>
                    </div>
                    <?php if ($verification_error): ?>
                        <p class="error"><?php echo $verification_error; ?></p>
                    <?php endif; ?>
                </form>
            <?php endif; ?>


            <!-- Show password update form if verified -->
            <?php if (isset($verified) && $verified): ?>
                <form class="form" method="POST">
                    <div class="input-box">
                        <label for="new_password">Enter new password</label>
                        <input type="password" name="new_password" id="new_password" required>
                        <button type="submit" name="update_password">Update</button>
                    </div>
                </form>
                <?php if ($password_updated): ?>
                    <p class="success"><?php echo $password_updated; ?></p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>