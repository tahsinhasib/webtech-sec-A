<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <?php
    function validateID($id) 
    {
        $pattern = '/^\d{2}-\d{5}-\d$/';
        
        if (preg_match($pattern, $id)) {
            return true;
        } else {
            return false;
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["username"];
            $id = $_POST["studentid"];
            $selectedBook = $_POST["book"];
            $borrowDate = $_POST["bdate"];
            $returnDate = $_POST["rdate"];


            if (empty($name)) {
                echo "Name required!";
            } elseif (empty($id)) {
                echo "Student ID required!";
            } elseif (!validateID($id)) {
                echo "Invalid Student ID format!";
            } elseif (empty($selectedBook)) {
                echo "Book selection required!";
            } elseif (empty($borrowDate)) {
                echo "Borrowing date required!";
            } elseif (empty($returnDate)) {
                echo "Return date required!";
            }
            else {
            $cookie_name = $_POST["studentid"];
            $cookie_value = $_POST["book"];
            // Check if the user already has a borrowed book
            if (isset($_COOKIE[$cookie_name])) {
                echo "<p>$cookie_name <br> $selectedBook </p>";
                echo "You cannot borrow more books until you return the first one.";
            } 
            else {
                // Set the cookie with the student ID and selected book
                setcookie($cookie_name, $selectedBook, time() + 86400*7); // Expires in 7 days
                echo "<p>Name: $name</p>";
                echo "<p>ID: $cookie_name</p>";
                echo "<p>Selected Book: $selectedBook</p>";
                echo "<p>Borrow Date: $borrowDate</p>";
                echo "<p>Return Date: $returnDate</p>";
            }
        }
    }
    ?>
</body>
</html>