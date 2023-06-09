<?php
// Retrieve form data
$name = $_POST['fname'] ?? '';
$email = $_POST['email']?? '';
$number =$_POST['pnumber']?? '';
$course =$_POST['course']?? '';
$gender =$_POST['gender']?? '';
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coursedb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data
if (isset($_POST['submit'])) {
    if (!empty($name) && !empty($email) && !empty($number) && !empty($course) && !empty($gender)) {
        $insertSql = "INSERT INTO select_course (fname,email,pnumber,course,gender) VALUES ('$name','$email', '$number','$course','$gender')";

        if ($conn->query($insertSql) === TRUE) {
            echo "Data inserted successfully!";
        } else {
            echo "Error inserting data: " . $conn->error;
        }
    } else {
        echo "fields are required for insertion.";
    }
}


// Close the database connection
$conn->close();
?>
