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
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    // Find the user in the collection
    $user = $collection->findOne(array("username" => $username));

    // Check if the user exists and the new passwords match
    if ($user && $new_password == $confirm_password) {
        // Update the user's password with hashed new password
        $collection->updateOne(
            array("username" => $username), 
            array('$set' => array("password" => password_hash($new_password, PASSWORD_DEFAULT)))
        );

        // Display a success message and redirect to login page
        echo "<script>alert('Password reset successful!');</script>";
        echo "<script>window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Invalid username or passwords do not match!');</script>";
    }
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS file -->
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

        .forget_password_section {
            padding: 50px 0;
        }

        .forget_password-form {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <section class="forget_password_section" id="forget_password">
        <div class="container">
            <div class="text_header">
                <span>Forget Password</span>
            </div>
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="forget_password-form" id="forget_password_form">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control" name="new_password" placeholder="New Password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
                </div>
                <!-- Submit Button -->
                <button type="submit" class="btn sbmt-bttn" name="forget_password-button">Reset Password</button>
            </form>
        </div>
    </section>
</body>
</html>

<?php
}
?>
