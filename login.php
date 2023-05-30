<?php
// Start a session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // Redirect the user to the home page or any other authenticated page
    header('Location: register.php');
    exit();
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Perform login authentication
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Loading the student XML file
    $xml = simplexml_load_file('students.xml');

    // Search for the student in the XML file
    $foundUser = false;
    foreach ($xml->Student as $student) {
        if ((string)$student->Name === $username && (string)$student->StudentNo === $password) {
            // Student found, set the user session
            $_SESSION['user_id'] = (int)$student->StudentNo;

            // Redirect the student to the registration page
            header('Location: register.php');
            exit();
        }
    }

    // Authentication failed
    $error = 'No such student in our data';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<style>
        body {
            background: white !important;
            font-family: 'Helvetica', sans-serif;
        }


        h1,
        h2 {
            text-align: center;
            padding-top: 50px;
        }

        .student-info {
            text-align: center;
            margin: auto;
            margin-bottom: 50px;
        }

        .logo{
            padding-top: 50PX;
            text-align: center;
        }
        .course-selection {
            text-align: center;
        }

        .comments-section {
            text-align: center;
            padding-bottom: 50px;
        }

        select {
            background: rgb(216, 212, 212);
            margin: auto;
            width: 50%;
            text-align: center;
            border: none;
            border-radius: 5px;
            box-shadow:2px 2px 4px rgba(0, 0, 0, 0.2);
            padding: 10px;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        button {
            margin-top: 10px;
        }


        button {
            color: white;
            background: #007bff !important;
            border: none;
            border-radius: 5px;
            width: 70px;
            height: 30px;
        }

        button:hover {
            background: #013c7a !important;
        }

        input{
            background: rgb(216, 212, 212);
            width: 30%;
            border: none;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }
</style>
<div class="logo">
    <img src="logo.jpeg" width="60px" height="60px" alt="logo"/>
</div>
<h1>Log in</h1>
<?php if (isset($error)): ?>
    <p><?php echo $error; ?></p>
<?php endif; ?>
<form method="POST" action="">
    <div class="container">
        <label for="username">Student Name:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Student Number:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Login</button>
    </div>
</form>
</body>
</html>
