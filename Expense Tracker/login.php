<?php
session_start();

// Define fixed login credentials (replace these with your actual credentials)
$Name = "localhost";
$Pass = "root123";

// Check if the user is already logged in, redirect if so
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
   
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the credentials
    if ($username === $Name && $password === $Pass) {
        // Set session variables
        $_SESSION['user_id'] = 1; // Replace with actual user ID or unique identifier

        // Redirect to dashboard after successful login
        header("Location: dashboard.php");
        exit;
    } else {
        // Invalid credentials, display error message or redirect back to login
        echo '<script>alert("Invalid username or password");</script>';
    }
}
?>
<?php
    include("navbar.php");
?>


    
<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">

    </head>
    <body>
        <br><br>
        <div id="form">
            <h1 id="heading">Login Form</h1>
            <form name="form" action="login.php" method="POST" required>
                <label>Enter Username: </label>
                <input type="text" id="username" name="username" required></br></br>
                <label>Password: </label>
                <input type="password" id="password" name="password" required></br></br>
                <input type="submit" id="btn" value="Login" name = "submit"/>
            </form>
            <form action="signup.php" method="post">
                <button id="btn" type="submit">New User? Signup</button>
            </form>
        </div>
        <script>
            function isvalid(){
                var user = document.form.user.value;
                if(user.length==""){
                    alert(" Enter username");
                    return false;
                }
                
            }
        </script>
    </body>
</html>  