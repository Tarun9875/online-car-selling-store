<?php
// Start output buffering to avoid "headers already sent" error
ob_start();

// MongoDB Connection
require 'vendor/autoload.php'; // Ensure MongoDB client is autoloaded using composer
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->cars->car_type;

// Page Title
$pageTitle = 'Car Types';

// Includes
include 'Includes/templates/header.php';

// Insert car type logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['type_label'])) {
    $type_label = $_POST['type_label'];
    $type_description = $_POST['type_description'];

    // Validate input
    if (empty($type_label) || empty($type_description)) {
        echo "<div class='alert alert-danger'>Both type label and description are required.</div>";
    } else {
        // Insert into MongoDB
        $insertResult = $collection->insertOne([
            'type_label' => $type_label,
            'type_description' => $type_description
        ]);

        if ($insertResult) {
            echo "<div class='alert alert-success'>Car type added successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Error adding car type</div>";
        }
    }
}

// Delete car type logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_type_sbmt'])) {
    $type_id = $_POST['type_id'];
    $deleteResult = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($type_id)]);

    if ($deleteResult->getDeletedCount() > 0) {
        echo "<div class='alert alert-success'>Car type deleted successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error deleting car type</div>";
    }
}

// Generate report logic
if (isset($_GET['generate_report'])) {
    // Ensure no output before headers
    ob_clean(); // Clear the output buffer

    // Set headers for file download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=car_types_report.csv');

    $output = fopen('php://output', 'w');
    fputcsv($output, array('Type ID', 'Type Label', 'Type Description'));

    $types = $collection->find();
    foreach ($types as $type) {
        fputcsv($output, [
            (string) $type['_id'],
            $type['type_label'],
            $type['type_description']
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
        <h1 class="h3 mb-0 text-gray-800">Car Types</h1>
        <a href="?generate_report=true" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>

    <!-- Car Types Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Car Types</h6>
        </div>
        <div class="card-body">

            <!-- ADD NEW TYPE BUTTON -->
            <button class="btn btn-success btn-sm" style="margin-bottom: 10px;" type="button" data-toggle="modal" data-target="#add_new_type" data-placement="top">
                <i class="fa fa-plus"></i> Add New Type
            </button>

            <!-- Add New Type Modal -->
            <div class="modal fade" id="add_new_type" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add New Type</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="type_label">Type Label</label>
                                    <input type="text" id="type_label" class="form-control" placeholder="Type Label" name="type_label" required>
                                </div>
                                <div class="form-group">
                                    <label for="type_description">Type Description</label>
                                    <input type="text" id="type_description" class="form-control" placeholder="Type Description" name="type_description" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-info">Add Type</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Types Table -->
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Type ID</th>
                            <th>Type Label</th>
                            <th>Type Description</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch car types from MongoDB
                        $types = $collection->find();
                        foreach ($types as $type) {
                            echo "<tr>
                                    <td>" . (string) $type['_id'] . "</td>
                                    <td>{$type['type_label']}</td>
                                    <td>{$type['type_description']}</td>
                                    <td>
                                        <form method='POST' style='display:inline;'>
                                            <input type='hidden' name='type_id' value='" . (string) $type['_id'] . "'>
                                            <button type='submit' name='delete_type_sbmt' class='btn btn-danger btn-sm'>
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
