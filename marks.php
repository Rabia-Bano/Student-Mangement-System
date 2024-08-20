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
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO marks (student_id, student_name, subject, marks) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $std_id, $std_name, $subject, $marks);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Marks added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>