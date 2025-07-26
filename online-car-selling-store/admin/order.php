<?php
    //Include Header
    include 'Includes/templates/header.php';

    // MongoDB Connection
    require 'vendor/autoload.php'; // Ensure Composer's autoloader is included

    $uri = "mongodb://localhost:27017"; // Replace with your MongoDB URI if different
    $client = new MongoDB\Client($uri);
    $db = $client->cars; // Database name
    $collection = $db->order_mast; // Collection name

    // Handle delete request
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_order_id'])) {
        $deleteOrderId = $_POST['delete_order_id'];

        // Delete the order with the specified ID
        $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($deleteOrderId)]);
        echo "<script>alert('Order deleted successfully!');</script>";
        echo "<script>window.location.href='order.php';</script>"; // Reload the page after deletion
    }

    // Fetch all orders
    $orders = $collection->find();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Display</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <style>
        /* Basic styling for the order display table */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .order-display-section {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .order-table th, .order-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .order-table th {
            background-color: #f2f2f2;
            color: #333;
        }

        .order-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .order-table tr:hover {
            background-color: #f1f1f1;
        }

        .order-table td {
            font-size: 14px;
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .order-display-section {
                width: 95%;
            }

            .order-table th, .order-table td {
                font-size: 12px;
            }
        }

        .delete-btn {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>
    <div class="order-display-section">
        <h2>Car Orders</h2>
        <?php if ($orders->isDead()): ?>
            <p>No orders found.</p>
        <?php else: ?>
            <table class="order-table">
                <thead>
                    <tr>
                        <th>Car Name</th>
                        <th>Model Name</th>
                        <th>Brand Name</th>
                        <th>Price</th>
                        <th>Email</th>
                        <th>Mobile No</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($order['car_name']); ?></td>
                            <td><?php echo htmlspecialchars($order['model_name']); ?></td>
                            <td><?php echo htmlspecialchars($order['brand_name']); ?></td>
                            <td><?php echo htmlspecialchars($order['price']); ?></td>
                            <td><?php echo htmlspecialchars($order['email']); ?></td>
                            <td><?php echo htmlspecialchars($order['mobile_no']); ?></td>
                            <td>
                                <!-- Delete form -->
                                <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" style="display:inline;">
                                    <input type="hidden" name="delete_order_id" value="<?php echo $order['_id']; ?>">
                                    <button type="submit" class="delete-btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
    //Include Footer
    include 'Includes/templates/footer.php';
?>
