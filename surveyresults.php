<?php
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

// Retrieve survey data from the database
$sql = "SELECT * FROM survey_data";
$result = $conn->query($sql);

// Calculate survey statistics
$totalSurveys = $result->num_rows;
$totalAge = 0;
$maxAge = 0;
$minAge = PHP_INT_MAX;
$pizzaPercentage = 0;
$pastaPercentage = 0;
$papAndWorsPercentage = 0;
$totalEatOutRating = 0;
$totalWatchMoviesRating = 0;
$totalWatchTVRating = 0;
$totalListenToRadioRating = 0;

while ($row = $result->fetch_assoc()) {
    $age = $row['age'];
    $totalAge += $age;

    if ($age > $maxAge) {
        $maxAge = $age;
    }

    if ($age < $minAge) {
        $minAge = $age;
    }

    $foods = explode(', ', $row['favouritefood']);
    if (in_array('Pizza', $foods)) {
        $pizzaPercentage++;
    }
    if (in_array('Pasta', $foods)) {
        $pastaPercentage++;
    }
    if (in_array('Pap and Wors', $foods)) {
        $papAndWorsPercentage++;
    }

    $totalEatOutRating += $row['eat_out_scale'];
    $totalWatchMoviesRating += $row['watch_movies_scale'];
    $totalWatchTVRating += $row['watch_tv_scale'];
    $totalListenToRadioRating += $row['listen_to_radio_scale'];
}

// Calculate percentages
$pizzaPercentage = round(($pizzaPercentage / $totalSurveys) * 100, 2);
$pastaPercentage = round(($pastaPercentage / $totalSurveys) * 100, 2);
$papAndWorsPercentage = round(($papAndWorsPercentage / $totalSurveys) * 100, 2);

// Calculate averages
$averageAge = round($totalAge / $totalSurveys, 2);
$averageEatOutRating = round($totalEatOutRating / $totalSurveys, 2);
$averageWatchMoviesRating = round($totalWatchMoviesRating / $totalSurveys, 2);
$averageWatchTVRating = round($totalWatchTVRating / $totalSurveys, 2);
$averageListenToRadioRating = round($totalListenToRadioRating / $totalSurveys, 2);

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
   <title>Survey Results</title>
</head>
<body>
   <h1>Survey Results</h1>
   <style>
      /* Center the button */
      .center {
         display: flex;
         justify-content: center;
         align-items: center;
      }

      /* Style the button */
      .submit-btn {
         border: 2px solid black;
         background-color: white;
         color: black;
         text-decoration: none;
         padding: 10px 20px;
         font-size: 16px;
         cursor: pointer;
      }

      .submit-btn:hover {
         background-color: #000;
         color: #fff;
      }
   </style>
   <p>Total number of surveys: <?php echo $totalSurveys; ?></p>
   <p>Average age: <?php echo $averageAge; ?></p>
   <p>Oldest person who participated in the survey: <?php echo $maxAge; ?></p>
   <p>Youngest person who participated in the survey: <?php echo $minAge; ?></p>
   <br>
   <p>Percentage of people who like Pizza: <?php echo $pizzaPercentage; ?>%</p>
   <p>Percentage of people who like Pasta: <?php echo $pastaPercentage; ?>%</p>
   <p>Percentage of people who like Pap and Wors: <?php echo $papAndWorsPercentage; ?>%</p>
   <br>
   <p>People who like to eat out (Average rating): <?php echo $averageEatOutRating; ?></p>
   <p>People who like to watch movies (Average rating): <?php echo $averageWatchMoviesRating; ?></p>
   <p>People who like to watch TV (Average rating): <?php echo $averageWatchTVRating; ?></p>
   <p>People who like to listen to the radio (Average rating): <?php echo $averageListenToRadioRating; ?></p>

   <div class="center">
      <a href="intro.php" class="submit-btn">Go Back to Survey</a>
   </div>
</body>
</html>


