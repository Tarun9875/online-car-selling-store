<?php
session_start();
include "connect.php";
include "Includes/templates/header.php";

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<h2>Your cart is empty!</h2>";
} else {
    ?>
    <h2>Your Cart</h2>
    <table>
        <tr>
            <th>Car ID</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        <?php
        $total_price = 0;
        foreach ($_SESSION['cart'] as $car) {
            $car_total = $car['price'] * $car['quantity'];
            $total_price += $car_total;
            ?>
            <tr>
                <td><?php echo $car['car_id']; ?></td>
                <td>$<?php echo number_format($car['price'], 2); ?></td>
                <td><?php echo $car['quantity']; ?></td>
                <td>$<?php echo number_format($car_total, 2); ?></td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td colspan="3">Total Price</td>
            <td>$<?php echo number_format($total_price, 2); ?></td>
        </tr>
    </table>

    <!-- Option to checkout or clear cart -->
    <a href="checkout.php" class="btn btn-success">Checkout</a>
    <a href="clear_cart.php" class="btn btn-danger">Clear Cart</a>
    <?php
}

include "Includes/templates/footer.php";
?>
