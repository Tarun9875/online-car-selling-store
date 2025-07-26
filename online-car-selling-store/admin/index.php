<?php
// Create a MongoDB connection
require 'vendor/autoload.php';

// Create a new MongoDB client
$client = new MongoDB\Client("mongodb://localhost:27017");

// Select the database
$database = $client->cars;

// Select the collection
$collection = $database->admin_login;

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Find the user in the collection
    $user = $collection->findOne(array("username" => $username));

    // Check if the user exists and the password is correct
    if ($user && password_verify($password, $user["password"])) {
        // Start a session and store the user's username
        session_start();
        $_SESSION["username"] = $username;

        // Redirect to the dashboard page
        echo "<script>window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Invalid username or password!');</script>";
    }
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your external CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .text_header {
            text-align: center;
            margin-bottom: 20px;
        }

        .text_header span {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 16px;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .login_section {
            padding: 50px 0;
        }

        .login-form {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .forgotPW {
            display: block;
            margin-top: 10px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }

        .forgotPW a {
            color: #007bff;
            text-decoration: none;
        }

        .forgotPW a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <section class="login_section" id="login">
        <div class="container">
            <div class="text_header">
                <span>Login</span>
            </div>
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="login-form" id="login_form">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <!-- Submit Button -->
                <button type="submit" class="btn sbmt-bttn" name="login-button">Login</button>

                <!-- Links for registration and password reset -->
                <span class="forgotPW">Don't have an account? <a href="register.php">Register here.</a></span>
                <span class="forgotPW">Forgot your password? <a href="forget.php">Reset it here.</a></span>
            </form>
        </div>
    </section>
</body>
</html>

<?php
}
?>
