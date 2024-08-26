<?php 

session_start();

$username = $password = "";
$login_error = "";

// Check if the form was submitted via POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitise form data
    $username = isset($_POST["username"]) ? trim($_POST["username"]) : '';
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : '';

    // Simple authentication check 
    if ($username === 'user' && $password === 'password') {
        $_SESSION["loggedin"] = true; // Set session variable
        $_SESSION["username"] = $username;
        header("Location: welcome.php"); // Redirect to welcome page
        exit();
    } else {
        // Redirect back to login page with an error message
        header("Location: login.html?error=" . urlencode("Invalid username or password."));
        exit();
    }
}