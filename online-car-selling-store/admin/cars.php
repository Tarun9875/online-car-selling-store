<?php
        include 'Includes/templates/header.php';
?>

<?php
// Include MongoDB Connection
require 'vendor/autoload.php'; // Include Composer's autoloader for MongoDB

// MongoDB connection
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->cars->add_cars;

$message = '';

// Add New Car
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['car_name'])) {
    $carName = $_POST['car_name'];
    $carType = $_POST['car_type'];
    $carDescription = $_POST['car_description'];
    $carPrice = $_POST['car_price'];
    $carImage = isset($_FILES['car_image']) ? $_FILES['car_image']['name'] : '';

    $newCar = [
        'name' => $carName,
        'type' => $carType,
        'description' => $carDescription,
        'price' => (float)$carPrice,
        'image' => $carImage,
        'created_at' => new MongoDB\BSON\UTCDateTime()
    ];

    // Insert the car into MongoDB
    $collection->insertOne($newCar);

    // Handle Image Upload
    if (!empty($carImage)) {
        move_uploaded_file($_FILES['car_image']['tmp_name'], 'uploads/' . $carImage);
    }

    $message = ['type' => 'alert-success', 'text' => 'Car added successfully'];
}

// Fetch All Cars
$cars = $collection->find();

// Delete Car
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_car_id'])) {
    $carId = new MongoDB\BSON\ObjectId($_POST['delete_car_id']);
    $collection->deleteOne(['_id' => $carId]);
    $message = ['type' => 'alert-danger', 'text' => 'Car deleted successfully'];
}

// Generate CSV Report
if (isset($_GET['generate_report'])) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="cars_report.csv"');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['Car Name', 'Car Type', 'Description', 'Price']);

    foreach ($cars as $car) {
        fputcsv($output, [$car['name'], $car['type'], $car['description'], $car['price']]);
    }

    fclose($output);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cars</h1>
        <a href="?generate_report=true" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>

    <!-- Alert Message -->
    <?php if ($message): ?>
        <div class="alert <?= $message['type'] ?>">
            <?= $message['text'] ?>
        </div>
    <?php endif; ?>

    <!-- Add New Car Modal -->
    <button class="btn btn-success btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#add_new_car">
        <i class="fa fa-plus"></i> Add New Car
    </button>

    <!-- Add New Car Modal Form -->
    <div class="modal fade" id="add_new_car" tabindex="-1" aria-labelledby="addNewCarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Car</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="car_name">Car Name</label>
                            <input type="text" id="car_name" class="form-control" name="car_name" required>
                        </div>
                        <div class="form-group">
                            <label for="car_type">Car Brand</label>
                            <input type="text" id="car_type" class="form-control" name="car_type" required>
                        </div>
                        <div class="form-group">
                            <label for="car_description">Description</label>
                            <textarea id="car_description" class="form-control" name="car_description" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="car_price">Price</label>
                            <input type="number" id="car_price" class="form-control" name="car_price" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="car_image">Car Image</label>
                            <input type="file" id="car_image" class="form-control" name="car_image" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-info">Add Car</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Cars Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Cars</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Car Name</th>
                            <th>Brand</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Image</th> <!-- Added Image column -->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cars as $car): ?>
                            <tr>
                                <td><?= $car['name'] ?></td>
                                <td><?= $car['type'] ?></td>
                                <td><?= $car['description'] ?></td>
                                <td><?= $car['price'] ?></td>
                                
                                <td>
                                <!-- Display car image if available -->
                                <?php if (!empty($car['image'])): ?>
                                    <img src="uploads/<?= $car['image'] ?>" alt="<?= $car['name'] ?>" style="width: 100px; height: auto;">
                                <?php else: ?>
                                    N/A
                                <?php endif; ?>
                            </td>
                                <td>
                                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit_car_<?= $car['_id'] ?>">Edit</button>
                                    <form method="POST" action="" style="display:inline;">
                                        <input type="hidden" name="delete_car_id" value="<?= $car['_id'] ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</body>
</html>
<?php
        
	    //Include Footer
	    include 'Includes/templates/footer.php';
	
	
?>
