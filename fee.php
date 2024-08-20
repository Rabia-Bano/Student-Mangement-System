<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college";

try {  
    $dsn = "mysql:host=$host;dbname=$db_name;charset=utf8mb4"; 
    $options = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false ]; 
    $conn = new PDO($dsn, $db_username, $db_password, $options); 
} catch (PDOException $e) 
{ 
    
    die("Connection failed: " . $e->getMessage());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $std_id = $_POST['std_id'];
    $std_name = $_POST['std_name'];
    $challan_num = $_POST['challan_num'];
    $date = $_POST['date'];
    $amount = $_POST['amount'];
    $payment_method = $_POST['payment_method'];
    $card_num = $_POST['card_num']; // Assuming card_num serves for payment methods

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO fee (student_id, student_name, challan_number, date, amount, payment_method, card_number) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssss", $std_id, $std_name, $challan_num, $date, $amount, $payment_method, $card_num);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Fee submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>