<?php
        
	    //Include Footer
	    include 'Includes/templates/header.php';
	
	
?>

<?php
require 'vendor/autoload.php'; // Include Composer's autoloader for MongoDB

// MongoDB Connection
$uri = "mongodb://localhost:27017"; // Replace with your MongoDB URI if different
$client = new MongoDB\Client($uri);
$db = $client->cars; // Database name

// Collections
$clientsCollection = $db->clients;
$carstypeCollection = $db->car_type; // Replace with your clients collection name
$carBrandsCollection = $db->car_brands; // Replace with your car brands collection name
$carsCollection = $db->add_cars; // Replace with your cars collection name
$reservationsCollection = $db->order_mast; // Replace with your reservations collection name

// Fetch Data
$totalClients = $clientsCollection->countDocuments();
$totaltype = $carstypeCollection->countDocuments();
$totalCarBrands = $carBrandsCollection->countDocuments();
$totalCars = $carsCollection->countDocuments();
$totalReservations = $reservationsCollection->countDocuments();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="path_to_bootstrap.css">
    <link rel="stylesheet" href="path_to_fontawesome.css">
</head>
<body>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
            </a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Total Clients -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Clients
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalClients"><?php echo $totalClients; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Type -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Total Type
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalCars"><?php echo $totaltype; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-car-side fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Total Car Brands -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Car Brands
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalCarBrands"><?php echo $totalCarBrands; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-car fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Cars -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Total Cars
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalCars"><?php echo $totalCars; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-car-side fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Reservations -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Total Orders
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalReservations"><?php echo $totalReservations; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="path_to_bootstrap.js"></script>
    <script src="path_to_fontawesome.js"></script>
    <script src="path_to_your_custom_script.js"></script>
</body>
</html>

<?php
// Include Footer
include 'Includes/templates/footer.php';
?>
