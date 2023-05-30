<!DOCTYPE html>
<html>
<head>
   <title>Survey Options</title>
   <style>
      body {
         display: flex;
         justify-content: center;
         align-items: center;
         height: 100vh;
         background-color: #fff;
      }

      .survey-options {
         text-align: center;
      }

      .survey-options a {
         display: inline-block;
         margin-bottom: 10px;
         padding: 12px 20px; 
         background-color: #fff;
         color: #000;
         text-decoration: none;
         font-size: 16px;
         font-weight: bold;
         border: 2px solid #000; 
         transition: background-color 0.3s ease;
      }

      .survey-options a:hover {
         background-color: #000;
         color: #fff;
      }
   </style>
</head>
<body>
   <div class="survey-options">
      <h1>Survey Options</h1>
      <a href="index.php">Fill out survey</a>
      <br>
      <a href="surveyresults.php">View survey results</a>
   </div>
</body>
</html>
