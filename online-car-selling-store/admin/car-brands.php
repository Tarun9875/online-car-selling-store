<?php
// MongoDB Connection
require 'vendor/autoload.php'; // Ensure MongoDB client is autoloaded using composer
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->cars->car_brands;

// Page Title
$pageTitle = 'Car Brands';

// Buffer output to avoid "headers already sent" error
ob_start();

// Includes
include 'Includes/templates/header.php';

// Insert car brand logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['brand_name'])) {
    $brand_name = $_POST['brand_name'];
    $price = $_POST['price'];

    // Handle image upload
    if (isset($_FILES['brand_image']) && $_FILES['brand_image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['brand_image']['tmp_name'];
        $fileName = $_FILES['brand_image']['name'];
        $fileSize = $_FILES['brand_image']['size'];
        $fileType = $_FILES['brand_image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        
        // Set allowed file types (e.g., jpeg, png)
        $allowedfileExtensions = array('jpg', 'jpeg', 'png');
        
        if (in_array($fileExtension, $allowedfileExtensions)) {
            // Define upload directory
            $uploadFileDir = './uploads/';
            $dest_path = $uploadFileDir . $fileName;
            
            if(move_uploaded_file($fileTmpPath, $dest_path)) {
                // Validate input
                if (empty($brand_name) || empty($price)) {
                    echo "<div class='alert alert-danger'>Brand name, price, and image are required.</div>";
                } else {
                    // Insert into MongoDB
                    $insertResult = $collection->insertOne([
                        'brand_name' => $brand_name,
                        'price' => $price,
                        'brand_image' => $dest_path
                    ]);
                    
                    if ($insertResult) {
                        echo "<div class='alert alert-success'>Car brand added successfully</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Error adding car brand</div>";
                    }
                }
            } else {
                echo "<div class='alert alert-danger'>Error moving the uploaded file.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Only .jpg, .jpeg, .png files are allowed.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Brand image is required.</div>";
    }
}

// Delete car brand logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_brand_sbmt'])) {
    $brand_id = $_POST['brand_id'];
    $deleteResult = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($brand_id)]);

    if ($deleteResult->getDeletedCount() > 0) {
        echo "<div class='alert alert-success'>Car brand deleted successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error deleting car brand</div>";
    }
}

// Generate report logic
if (isset($_GET['generate_report'])) {
    ob_clean(); // Clear the output buffer

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=car_brands_report.csv');

    $output = fopen('php://output', 'w');
    fputcsv($output, array('Brand ID', 'Brand Name', 'Price', 'Brand Image'));

    $brands = $collection->find();
    foreach ($brands as $brand) {
        fputcsv($output, [
            (string) $brand['_id'],
            $brand['brand_name'],
            $brand['price'],
            $brand['brand_image']
        ]);
    }

    fclose($output);
    exit();
}

// Flush the output buffer
ob_end_flush();
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Car Brands</h1>
        <a href="?generate_report=true" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>

    <!-- Car Brands Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Car Brands</h6>
        </div>
        <div class="card-body">

            <!-- ADD NEW BRAND BUTTON -->
            <button class="btn btn-success btn-sm" style="margin-bottom: 10px;" type="button" data-toggle="modal" data-target="#add_new_brand" data-placement="top">
                <i class="fa fa-plus"></i> Add New Brand
            </button>

            <!-- Add New Brand Modal -->
            <div class="modal fade" id="add_new_brand" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add New Brand</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="brand_name">Brand Name</label>
                                    <input type="text" id="brand_name" class="form-control" placeholder="Brand Name" name="brand_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" id="price" class="form-control" placeholder="Price" name="price" required>
                                </div>
                                <div class="form-group">
                                    <label for="brand_image">Brand Image</label>
                                    <input type="file" id="brand_image" class="form-control-file" name="brand_image" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-info">Add Brand</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Brands Table -->
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Brand ID</th>
                            <th>Brand Name</th>
                            <th>Price</th>
                            <th>Brand Image</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch car brands from MongoDB
                        $brands = $collection->find();
                        foreach ($brands as $brand) {
                            echo "<tr>
                                    <td>" . (string) $brand['_id'] . "</td>
                                    <td>{$brand['brand_name']}</td>
                                    <td>{$brand['price']}</td>
                                    <td><img src='{$brand['brand_image']}' alt='{$brand['brand_name']}' style='width: 100px; height: auto;'></td>
                                    <td>
                                        <form method='POST' style='display:inline;'>
                                            <input type='hidden' name='brand_id' value='" . (string) $brand['_id'] . "'>
                                            <button type='submit' name='delete_brand_sbmt' class='btn btn-danger btn-sm'>
                                                <i class='fa fa-trash'></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                  </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
// Include Footer
include 'Includes/templates/footer.php';
?>
