
<?php
        include 'Includes/templates/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome.min.css">
</head>
<body>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Clients</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i>
                Generate Report
            </a>
        </div>

        <!-- Clients Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
            </div>
            <div class="card-body">
                
                <!-- Clients Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID#</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">E-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Static Data for Demonstration -->
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>(123) 456-7890</td>
                                <td>john.doe@example.com</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jane Smith</td>
                                <td>(098) 765-4321</td>
                                <td>jane.smith@example.com</td>
                            </tr>
                            <!-- Add more static rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Footer -->
    <script src="path/to/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
        include 'Includes/templates/footer.php';
?>
