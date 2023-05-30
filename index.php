<?php 

$foodOptions = array(
    'Pizza',
    'Pasta',
    'Pap and Wors',
    'Chicken stir fry',
    'Beef stir fry',
    'Other'
);

$errors = []; // Initialize an array to store errors

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    // Validate the input fields
    if (empty($surname)) {
        $errors['surname'] = "Surname is required.";
    }

    if (empty($firstNames)) {
        $errors['name'] = "First Names are required.";
    }

    if (empty($contactNumber)) {
        $errors['contactno'] = "Contact number is required.";
    }

    if (empty($date)) {
        $errors['date'] = "Date is required.";
    }

    if (empty($age)) {
        $errors['age'] = "Age is required.";
    } elseif ($age < 5 || $age > 120) {
        $errors['age'] = "Age must be between 5 and 120.";
    }

    if (empty($favouriteFoods)) {
        $errors['foods'] = "Please select at least one favourite food.";
    }

    if (empty($scaleEatOut)) {
        $errors['eat_out'] = "Please provide a rating for 'I like to eat out'.";
    }

    if (empty($scaleWatchMovies)) {
        $errors['watch_movies'] = "Please provide a rating for 'I like to watch movies'.";
    }

    if (empty($scaleWatchTV)) {
        $errors['watch_TV'] = "Please provide a rating for 'I like to watch TV'.";
    }

    if (empty($scaleListenToRadio)) {
        $errors['listen_radio'] = "Please provide a rating for 'I like to listen to the radio'.";
    }

    if (empty($errors)) {
        
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
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
   <title>Take our Survey</title>
</head>
<body>
   <h1>Take our Survey</h1>
   <style>
    table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid black;
    }
    
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    
    th {
        background-color: #8f8c8c;
    }

    .button-container {
        text-align: center;
        margin-top: 20px;
    }

    input[type="submit"] {
        background-color: white;
        border: 2px solid black;
        color: black;
        font-size: 16px;
         font-weight: bold;
        padding: 10px 20px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: black;
        color: white;
    }
</style>
   <form method="POST" action="">
       <h2>Personal Details:</h2>
       <label for="surname">Surname:</label>
       <input type="text" id="surname" name="surname" required value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>">
       <?php if (isset($errors['surname'])) { echo "<p style='color: red;'>".$errors['surname']."</p>"; } ?>
       <br><br>

       <label for="name">First Names:</label>
       <input type="text" id="name" name="name" required value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
       <?php if (isset($errors['name'])) { echo "<p style='color: red;'>".$errors['name']."</p>"; } ?>
       <br><br>

       <label for="contactno">Contact number:</label>
       <input type="text" id="contactno" name="contactno" required value="<?php echo isset($_POST['contactno']) ? htmlspecialchars($_POST['contactno']) : ''; ?>">
       <?php if (isset($errors['contactno'])) { echo "<p style='color: red;'>".$errors['contactno']."</p>"; } ?>
       <br><br>

       <label for="date">Date:</label>
       <input type="date" id="date" name="date" required value="<?php echo isset($_POST['date']) ? htmlspecialchars($_POST['date']) : ''; ?>">
       <?php if (isset($errors['date'])) { echo "<p style='color: red;'>".$errors['date']."</p>"; } ?>
       <br><br>

       <label for="age">Age:</label>
       <input type="text" id="age" name="age" required value="<?php echo isset($_POST['age']) ? htmlspecialchars($_POST['age']) : ''; ?>">
       <?php if (isset($errors['age'])) { echo "<p style='color: red;'>".$errors['age']."</p>"; } ?>
       <br><br>

       <h2>What is your favourite food? (You can choose more than 1 answer)</h2>
       <?php foreach ($foodOptions as $option) { ?>
        <input type="checkbox" name="foods[]" value="<?php echo $option; ?>" <?php /*if (in_array($option, $favouriteFoods)) echo 'checked'; */?>>
        <label><?php echo $option; ?></label><br>
        <?php } ?>
        <?php if (isset($errors['foods'])) { echo "<p style='color: red;'>".$errors['foods']."</p>"; } ?>
        <br><br>

       <h2>On a scale of 1 to 5, indicate whether you strongly agree to strongly disagree</h2>
       <table>
        <tr>
            <th></th>
            <th>Strongly Agree (1)</th>
            <th>Agree (2)</th>
            <th>Neutral (3)</th>
            <th>Disagree (4)</th>
            <th>Strongly Disagree (5)</th>
        </tr>
        <tr>
            <td>I like to eat out:</td>
            <td><input type="radio" name="eat_out" value="1" <?php if (isset($_POST['eat_out']) && $_POST['eat_out'] == '1') echo 'checked'; ?>></td>
            <td><input type="radio" name="eat_out" value="2" <?php if (isset($_POST['eat_out']) && $_POST['eat_out'] == '2') echo 'checked'; ?>></td>
            <td><input type="radio" name="eat_out" value="3" <?php if (isset($_POST['eat_out']) && $_POST['eat_out'] == '3') echo 'checked'; ?>></td>
            <td><input type="radio" name="eat_out" value="4" <?php if (isset($_POST['eat_out']) && $_POST['eat_out'] == '4') echo 'checked'; ?>></td>
            <td><input type="radio" name="eat_out" value="5" <?php if (isset($_POST['eat_out']) && $_POST['eat_out'] == '5') echo 'checked'; ?>></td>
        </tr>
        <tr>
            <td>I like to watch movies:</td>
            <td><input type="radio" name="watch_movies" value="1" <?php if (isset($_POST['watch_movies']) && $_POST['watch_movies'] == '1') echo 'checked'; ?>></td>
            <td><input type="radio" name="watch_movies" value="2" <?php if (isset($_POST['watch_movies']) && $_POST['watch_movies'] == '2') echo 'checked'; ?>></td>
            <td><input type="radio" name="watch_movies" value="3" <?php if (isset($_POST['watch_movies']) && $_POST['watch_movies'] == '3') echo 'checked'; ?>></td>
            <td><input type="radio" name="watch_movies" value="4" <?php if (isset($_POST['watch_movies']) && $_POST['watch_movies'] == '4') echo 'checked'; ?>></td>
            <td><input type="radio" name="watch_movies" value="5" <?php if (isset($_POST['watch_movies']) && $_POST['watch_movies'] == '5') echo 'checked'; ?>></td>
        </tr>
        <tr>
            <td>I like to watch TV:</td>
            <td><input type="radio" name="watch_TV" value="1" <?php if (isset($_POST['watch_TV']) && $_POST['watch_TV'] == '1') echo 'checked'; ?>></td>
            <td><input type="radio" name="watch_TV" value="2" <?php if (isset($_POST['watch_TV']) && $_POST['watch_TV'] == '2') echo 'checked'; ?>></td>
            <td><input type="radio" name="watch_TV" value="3" <?php if (isset($_POST['watch_TV']) && $_POST['watch_TV'] == '3') echo 'checked'; ?>></td>
            <td><input type="radio" name="watch_TV" value="4" <?php if (isset($_POST['watch_TV']) && $_POST['watch_TV'] == '4') echo 'checked'; ?>></td>
            <td><input type="radio" name="watch_TV" value="5" <?php if (isset($_POST['watch_TV']) && $_POST['watch_TV'] == '5') echo 'checked'; ?>></td>
        </tr>
        <tr>
            <td>I like to listen to the radio:</td>
            <td><input type="radio" name="listen_radio" value="1" <?php if (isset($_POST['listen_radio']) && $_POST['listen_radio'] == '1') echo 'checked'; ?>></td>
            <td><input type="radio" name="listen_radio" value="2" <?php if (isset($_POST['listen_radio']) && $_POST['listen_radio'] == '2') echo 'checked'; ?>></td>
            <td><input type="radio" name="listen_radio" value="3" <?php if (isset($_POST['listen_radio']) && $_POST['listen_radio'] == '3') echo 'checked'; ?>></td>
            <td><input type="radio" name="listen_radio" value="4" <?php if (isset($_POST['listen_radio']) && $_POST['listen_radio'] == '4') echo 'checked'; ?>></td>
            <td><input type="radio" name="listen_radio" value="5" <?php if (isset($_POST['listen_radio']) && $_POST['listen_radio'] == '5') echo 'checked'; ?>></td>
        </tr>
    </table>

    <?php if (isset($errors['eat_out'])) { echo "<p style='color: red;'>".$errors['eat_out']."</p>"; } ?>
        <?php if (isset($errors['watch_movies'])) { echo "<p style='color: red;'>".$errors['watch_movies']."</p>"; } ?>
        <?php if (isset($errors['watch_TV'])) { echo "<p style='color: red;'>".$errors['watch_TV']."</p>"; } ?>
        <?php if (isset($errors['listen_radio'])) { echo "<p style='color: red;'>".$errors['listen_radio']."</p>"; } ?>
        

    <div class="button-container">
        <input type="submit" value="Submit">
    </div>

   </form>
</body>
</html>
