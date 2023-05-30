<?php/*
$surname = $_POST['surname'] ?? '';
$firstNames = $_POST['name'] ?? '';
$contactNumber = $_POST['contactno'] ?? '';
$date = date('Y-m-d', strtotime($_POST['date'] ?? ''));
$age = $_POST['age'] ?? '';
$favouriteFoods = $_POST['foods'] ?? [];
$scaleEatOut = $_POST['eat_out'] ?? '';
$scaleWatchMovies = $_POST['watch_movies'] ?? '';
$scaleWatchTV = $_POST['watch_TV'] ?? '';
$scaleListenToRadio = $_POST['listen_radio'] ?? '';

// Database connection details
$servername = 'localhost';
$username = 'internProject';
$password = 'intern_Project#123';
$dbname = 'survey_db';

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$favouriteFoodsStr = implode(", ", $favouriteFoods);

// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO survey_data (name, surname, age, contactno, date, favouritefood, eat_out_scale, watch_movies_scale, watch_tv_scale, listen_to_radio_scale) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisssiiii", $firstNames, $surname, $age, $contactNumber, $date, $favouriteFoodsStr, $scaleEatOut, $scaleWatchMovies, $scaleWatchTV, $scaleListenToRadio);

// Execute the statement
$stmt->execute();

// Check if the insertion was successful
if ($stmt->affected_rows > 0) {
    echo "Thank you for participating in the survey!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();

// Redirect to intro.php
header("Location: intro.php");
exit();*/
?>
