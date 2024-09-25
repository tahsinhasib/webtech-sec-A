<?php
$host = 'localhost';
$db = 'inventory_db';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Load 5 default products when the page loads
if (isset($_GET['action']) && $_GET['action'] == 'default_products') {
    $sql = "SELECT * FROM inventory LIMIT 5";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='database-values'>";
            echo "<span class='label'>Brand:</span> <span class='value'>" . $row['brand_name'] . "</span><br>";
            echo "<span class='label'>Manufacturer:</span> <span class='value'>" . $row['manufacturer'] . "</span><br>";
            echo "<span class='label'>Price:</span> <span class='value'>$" . $row['price'] . "</span><br>";
            echo "<span class='label'>Quantity:</span> <span class='value'>" . $row['quantity'] . "</span><br>";
            echo "<span class='label'>Warranty:</span> <span class='value'>" . $row['warranty'] . " years</span><br>";
            echo "</div><hr>";
        }
    } else {
        echo "No products available in the inventory.";
    }
}

// Handle search functionality
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];
    $sql = "SELECT * FROM inventory 
            WHERE brand_name LIKE '%$searchQuery%' 
               OR manufacturer LIKE '%$searchQuery%'
               OR price LIKE '%$searchQuery%'
               OR warranty LIKE '%$searchQuery%'
               OR quantity LIKE '%$searchQuery%'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='database-values'>";
            // echo "Brand:" . $row['brand_name'] . "<br>";
            // echo "Manufacturer: " . $row['manufacturer'] . "<br>";
            // echo "Price: $" . $row['price'] . "<br>";
            // echo "Quantity: " . $row['quantity'] . "<br>";
            // echo "Warranty: " . $row['warranty'] . " years<br>";
            // echo "</div><hr>";
            echo "<span class='label'>Brand:</span> <span class='value'>" . $row['brand_name'] . "</span><br>";
            echo "<span class='label'>Manufacturer:</span> <span class='value'>" . $row['manufacturer'] . "</span><br>";
            echo "<span class='label'>Price:</span> <span class='value'>$" . $row['price'] . "</span><br>";
            echo "<span class='label'>Quantity:</span> <span class='value'>" . $row['quantity'] . "</span><br>";
            echo "<span class='label'>Warranty:</span> <span class='value'>" . $row['warranty'] . " years</span><br>";
            echo "</div><hr>";
        }
    } else {
        // Display the option to add a product if no results are found
        echo "<p>No results found for '$searchQuery'. Would you like to add this product?</p>";
        echo "<button onclick='showAddProductForm()'>Yes, Add Product</button>";

        // Inject the showAddProductForm function to ensure it works
        echo "<script>
                function showAddProductForm() {
                    document.getElementById('addProductForm').style.display = 'block';
                }
              </script>";
    }
}

// Handle adding the new product
if (isset($_POST['brand_name'])) {
    $brand = $_POST['brand_name'];
    $manufacturer = $_POST['manufacturer'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $warranty = $_POST['warranty'];

    $insert_sql = "INSERT INTO inventory (brand_name, manufacturer, price, quantity, warranty)
                   VALUES ('$brand', '$manufacturer', '$price', '$quantity', '$warranty')";

    if ($conn->query($insert_sql) === TRUE) {

        if (empty($brand)) {
            echo "Brand name required!";
        } elseif (empty($manufacturer)) {
            echo "manufacturer name required!";
        } 
        elseif (empty($price)) {
            echo "Price required!";
        } 
        elseif (empty($quantity)) {
            echo "quantity required!";
        } 
        elseif (empty($warranty)) {
            echo "warranty date required!";
        }
        else {
            echo "Product added successfully!";
        }
    } else {
        echo "Error: " . $conn->error;
    }
}



?>
