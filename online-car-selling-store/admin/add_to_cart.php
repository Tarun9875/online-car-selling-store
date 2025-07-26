<?php
session_start();

if (isset($_POST['car_id'])) {
    $car_id = $_POST['car_id'];
    $car_price = $_POST['car_price'];
    
    // Initialize the cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    
    // Check if the car is already in the cart
    if (isset($_SESSION['cart'][$car_id])) {
        // If it's already in the cart, increase the quantity
        $_SESSION['cart'][$car_id]['quantity'] += 1;
    } else {
        // If it's not in the cart, add it with quantity 1
        $_SESSION['cart'][$car_id] = [
            'car_id' => $car_id,
            'price' => $car_price,
            'quantity' => 1
        ];
    }

    // Redirect the user to a cart page (or back to the homepage)
    header("Location: cart.php");
    exit();
}
?>
