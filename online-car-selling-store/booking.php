<?php 
    #PHP INCLUDES
   
    include "Includes/templates/header.php";
    include "Includes/templates/navbar.php";
?>
<?php
// Create a MongoDB connection
require 'vendor/autoload.php';

// Create a new MongoDB client
$client = new MongoDB\Client("mongodb://localhost:27017");

// Select the database
$database = $client->cars;

// Select the collection
$collection = $database->order_mast;

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $car_name = $_POST["car_name"];
    $model_name = $_POST["model_name"];
    $brand_name = $_POST["brand_name"];
    $price = $_POST["price"];
    $email = $_POST["email"];
    $mobile_no = $_POST["mobile_no"];

    // Create a new document
    $document = array(
        "car_name" => $car_name,
        "model_name" => $model_name,
        "brand_name" => $brand_name,
        "price" => $price,
        "email" => $email,
        "mobile_no" => $mobile_no
    );

    // Check if the record already exists in the database
    $existing_document = $collection->findOne($document);

    if ($existing_document) {
        // Display an alert message if the record already exists
        echo "<script>alert('Record already exists in the database!');</script>";
    } else {
        // Insert the document into the collection
        $collection->insertOne($document);

        // Display a success message and redirect to index.php
        echo "<script>alert('Car reservation successful!');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }

} else {
    
    ?>
    
    <section class="reservation_section" style="padding:50px 0px" id="reserve">
        <
        <div class="container">
            <br>
            <br>
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-7">
                    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="car-reservation-form" id="reservation">
                        <div class="text_header">
                            <span>Booking your car</span>
                        </div>
                        <div>
                            <div class="form-group">
                                <label for="car_name">Car Name</label>
                                <input type="text" class="form-control" name="car_name" placeholder="Car Name" required>
                            </div>
                            <div class="form-group">
                                <label for="model_name">Model Name</label>
                                <input type="text" class="form-control" name="model_name" placeholder="Model Name" required>
                            </div>
                            <div class="form-group">
                                <label for="brand_name">Brand Name</label>
                                <input type="text" class="form-control" name="brand_name" placeholder="Brand Name" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" name="price" placeholder="Price" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Gmail</label>
                                <input type="email" class="form-control" name="email" placeholder="example@gmail.com" required>
                            </div>
                            <div class="form-group">
                                <label for="mobile_no">Mobile No</label>
                                <input type="text" class="form-control" name="mobile_no" placeholder="Mobile No" required>
                            </div>
                            <!-- Submit Button -->
                            <button type="submit" class="btn sbmt-bttn" name="reserve_car">Book Instantly</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>