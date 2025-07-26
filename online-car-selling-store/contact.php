<?php
require 'vendor/autoload.php'; // Ensure Composer's autoloader is included

// MongoDB Connection
$uri = "mongodb://localhost:27017"; // Replace with your MongoDB URI if different
$client = new MongoDB\Client($uri);
$db = $client->cars; // Database name
$collection = $db->contact; // Collection name

// Initialize response array
$response = ['status' => 'error', 'message' => 'Unknown error'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));
    
    if ($name && $email && $subject && $message) {
        // Prepare data to insert
        $contact_data = [
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $message,
            'sent_at' => new MongoDB\BSON\UTCDateTime() // Current timestamp
        ];

        // Insert data into MongoDB
        $result = $collection->insertOne($contact_data);

        // Check if insertion was successful
        if ($result->getInsertedCount() === 1) {
            $response = ['status' => 'success', 'message' => 'Message successfully sent!'];
        } else {
            $response = ['status' => 'error', 'message' => 'An error occurred while sending the message.'];
        }
    } else {
        $response = ['status' => 'error', 'message' => 'Please fill in all fields correctly.'];
    }
    
    // Return JSON response
    echo json_encode($response);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles.css"> <!-- Add your CSS file -->
    <style>
        .contact-section {
            padding: 100px 0px;
        }
        .contact-info h2 {
            font-size: 36px;
            color: #303133;
            margin: 0 0 8px;
            font-weight: 400;
            line-height: 48px;
            letter-spacing: -0.04em;
        }
        .contact-info h3 {
            line-height: 28px;
            margin-bottom: 20px;
        }
        .contact-info h4 {
            font-size: 15px;
            line-height: 28px;
        }
        .contact-form {
            background-color: #fff;
            padding: 50px 40px;
            box-shadow: 0px 50px 100px 0px rgba(64, 1, 4, 0.1), 0px -6px 0px 0px rgba(248, 99, 107, 0.004);
            border-radius: 3px;
        }
        .form-control {
            background-color: #fff;
            border-radius: 0;
            padding: 25px 10px;
            box-shadow: none;
            border: 2px solid #eee;
        }
        .form-control:focus {
            border-color: #04DBC0;
            box-shadow: none;
            outline: none;
        }
        .contact_send_btn {
            background-color: #04DBC0;
            color: #fff;
            font-family: "Work Sans", sans-serif;
            font-size: 15px;
            font-weight: 100;
            line-height: 50px;
            display: inline-block;
            padding: 0 10px;
            width: 100%;
            cursor: pointer;
            border: none;
            transition: all 0.5s ease-in-out;
        }
        .contact_send_btn:hover {
            background-color: #fab700;
            transition: all 0.5s ease-in-out;
        }
    </style>
</head>
<body>
    <?php include "Includes/templates/header.php"; ?>
    <?php include "Includes/templates/navbar.php"; ?>

    <section class="contact-section" id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 sm-padding">
                    <div class="contact-info">
                        <br>
                        <h2>
                            Get in touch with us & <br>send us a message today!
                        </h2>
                        <p>
                            Getting dressed up and traveling with good friends makes for a shared, unforgettable experience.
                        </p>
                        <h3>
                            198 West 21th Street, Suite 721 <br> New York, NY 10010
                        </h3>
                        <ul>
                            <li>
                                <span style="font-weight: bold">Email:</span> contact@yahyacarrental.com
                            </li>
                            <li>
                                <span style="font-weight: bold">Phone:</span> +88 (0) 101 0000 000
                            </li>
                            <li>
                                <span style="font-weight: bold">Fax:</span> +88 (0) 202 0000 001
                            </li>
                        </ul>
                        <a href="index.php" class="btn btn-secondary" style="margin-top: 20px;">Home</a>
                    </div>
                </div>
                
                
                <div class="col-lg-6 sm-padding">
                    <br>
                    <br>
                    <div class="contact-form">
                        <form id="contact_form" method="post">
                            <div class="form-group colum-row row">
                                <div class="col-sm-6">
                                    <input type="text" id="contact_name" name="name" class="form-control" placeholder="Name" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" id="contact_email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="text" id="contact_subject" name="subject" class="form-control" placeholder="Subject" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea id="contact_message" name="message" cols="30" rows="5" class="form-control message" placeholder="Message" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" id="contact_send" class="contact_send_btn">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "Includes/templates/footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#contact_form').submit(function(event) {
            event.preventDefault(); // Prevent form from submitting normally

            var formData = {
                name: $('#contact_name').val(),
                email: $('#contact_email').val(),
                subject: $('#contact_subject').val(),
                message: $('#contact_message').val()
            };

            $.ajax({
                type: 'POST',
                url: 'contact.php', // Make sure this URL points to the same file for processing
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        $('#contact_form')[0].reset(); // Reset the form
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert('An error occurred while sending the message.');
                }
            });
        });
    });
    </script>
</body>
</html>
