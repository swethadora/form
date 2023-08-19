<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    echo "Connected successfully";
    $conn->close();
} catch (mysqli_sql_exception $e) {
    die("Connection failed: " . $e->getMessage());
}
?><?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "form";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST["name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $message = $conn->real_escape_string($_POST["message"]);

    // Insert data into database
    $sql = "INSERT INTO form_data (name, email, message) VALUES ('$name', '$email', '$message')";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Form data has been submitted successfully.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();

?>

