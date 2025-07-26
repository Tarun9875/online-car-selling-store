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
    $confirm_password = $_POST["confirm_password"];

    // Check if the passwords match
    if ($password != $confirm_password) {
        echo "<script>alert('Passwords do not match!');</script>";
    } else {
        // Create a new document
        $document = array(
            "username" => $username,
            "password" => password_hash($password, PASSWORD_DEFAULT) // Hash the password for security
        );

        // Insert the document into the collection
        $collection->insertOne($document);

        // Display a success message and redirect to login page
        echo "<script>alert('Registration successful!');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
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

        .register_section {
            padding: 50px 0;
        }

        .register-form {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <section class="register_section" id="register">
        <div class="container">
            <div class="text_header">
                <span>Register</span>
            </div>
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="register-form" id="register_form">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm your password" required>
                </div>
                <!-- Submit Button -->
                <button type="submit" class="btn sbmt-bttn" name="register-button">Register</button>
            </form>
        </div>
    </section>
</body>
</html>

<?php
}
?>
