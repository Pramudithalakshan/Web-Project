<?php
include "connection.php";

session_start();

$user = $_SESSION["u"];
$netTotal = 0;

$rs = Database::search("SELECT * FROM `cart` 
INNER JOIN `stock` ON `cart`.`stock_stock_id`=`stock`.`stock_id` 
INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` 
INNER JOIN `size` ON `product`.`size_size_id` = `size`.`size_id` WHERE `cart`.`user_email` = '" . $user["email"] . "'");

$num = $rs->num_rows;
if ($num > 0) {

?>

    <!-- Cart load -->

    <div class="mt-4 mb-4">
        <h3>Shopping Cart</h3>
        <h5 class="text-center">Woo hooo! Let's complete your order, shall we?</h5>
    </div>


    <?php

    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();
        $total = $d["price"] * $d["cart_qty"];
        $netTotal += $total;

    ?>

        <!-- Cart Items -->

        <div class="col-12  p-3 mb-2 d-flex justify-content-between">

            <div class="d-flex align-items-center col-5">

                <img src="<?php echo $d["path"]; ?>" class="rounded-4" width="200px">
                <div class="ms-5">
                    <h4><?php echo $d["name"]; ?></h4>
                     
                    <p class="text-muted">Size : <?php echo $d["size"]; ?></p>
                    <h5 class="text-success">Rs:<?php echo $d["price"]; ?></h5>
                </div>
            </div>

            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-light btn-sm" onclick="decrementCartQty('<?php echo $d['cart_id']; ?>');">-</button>
                <input type="number" class="form-control form-control-sm text-center" id="qty<?php echo $d['cart_id']; ?>" style="max-width: 100px;" disabled value="<?php echo $d["cart_qty"]; ?>">
                <button class="btn btn-light btn-sm" onclick="incrementCartQty('<?php echo $d['cart_id']; ?>');">+</button>
            </div>

            <div class="d-flex align-items-center">
                <h4>Total : <span class="text-success"> Rs.<?php echo $total; ?></span></h4>
            </div>

            <div class="d-flex align-items-center">
                <button class="btn btn-danger" onclick="removeCart(<?php echo $d['cart_id']; ?>);"><i class="bi bi-trash"></i></button>
            </div>

        </div>

        <!-- Cart Items -->

    <?php
    }

    ?>
 

    <!-- Checkout -->

    <div class="d-flex flex-column align-items-end border border-dark rounded-4  ">
        <h6>No. Items: <span class="text-info"><?php echo $num ?></span></h6>
        <h5>Delivery Fee: <span class="text-muted">Rs.219.00</span></h5>
        <h3>Net Total: <span class="text-warning">Rs.<?php echo ($netTotal + 219) ?></span></h3>
        <button class="btn btn-success col-3 mt-3 mb-4" onclick="checkout();">Checkout</button>
    </div>

    <!-- Checkout -->


<?php
} else {
?>
    <div class="col-12 text-center mt-5">
        <h2>Your cart is empty!</h2>
        <a href="home.php" class="btn btn-primary">Start Shopping</a>
    </div>

<?php
}
