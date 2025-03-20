<?php
define('ASSET_PATH', '../../assets/'); // Adjust the path accordingly
?>

<?php
require_once '../../controllers/CartController.php';
session_start(); // Bắt đầu session
if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user']['Id'];
    $cartController = new CartController();
    $carts = $cartController->getCart($user_id);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="<?= ASSET_PATH ?>pictures/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= ASSET_PATH ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= ASSET_PATH ?>css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Topbar Start -->
    <?php include '../components/topbar.php'; ?>
    <!-- Topbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="./homePage.php">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php if (!empty($carts)): ?>
                            <?php foreach ($carts as $cart): ?>
                                <tr>
                                    <td class="align-middle"><img src="../../upload/products/<?= $cart['image'] ?>" alt="" style="width: 50px;"><?= $cart['name'] ?></td>
                                    <td class="align-middle"><?= $cart['stock'] ?></td>
                                    <td class="align-middle">
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-minus">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control form-control-sm bg-secondary text-center" value="<?= $cart['quantity'] ?>">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-plus">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle"><?= $cart['stock'] * $cart['quantity'] ?></td>
                                    <td class="align-middle">
                                        <button class="btn btn-sm btn-danger remove-from-cart" data-product-id="<?= $cart['product_id'] ?>">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-center">No categories found.</p>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">$150</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">$160</h5>
                        </div>
                        <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


    <!-- Footer Start -->
    <?php include '../components/footer.php'; ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?= ASSET_PATH ?>lib/easing/easing.min.js"></script>
    <script src="<?= ASSET_PATH ?>lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="<?= ASSET_PATH ?>mail/jqBootstrapValidation.min.js"></script>
    <script src="<?= ASSET_PATH ?>mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="<?= ASSET_PATH ?>js/main.js"></script>
    <script>
    $(document).ready(function () {
        $(".remove-from-cart").click(function () {
            let productId = $(this).data("product-id");
            let userId = <?php echo isset($_SESSION['user']['Id']) ? json_encode($_SESSION['user']['Id']) : 'null'; ?>;

            $.ajax({
                url: "../Handlers/cart_handler.php", // Adjust this path to your route/controller handler
                type: "POST",
                data: { action: "remove", product_id: productId, user_id: userId },
                success: function (response) {
                    let data = JSON.parse(response);
                    
                    if (data.success) {
                        alert(data.success);
                        location.reload(); // Reload page to update cart
                    } else {
                        alert(data.error);
                    }
                },
                error: function () {
                    alert("Something went wrong!");
                }
            });
        });
    });
</script>
</body>

</html>