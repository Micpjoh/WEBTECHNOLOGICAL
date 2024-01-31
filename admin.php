<?php
require_once "includes/securesession.inc.php";
require_once "includes/admin.inc.php";

if (!isset($_SESSION['user_id']) || ($_SESSION['user_type'] !== "admin")) {
    header("Location: index.php");
    die();
}

$userscount = user_amount($sqliconn);
$productscount = product_amount($sqliconn);
$orderscount = order_amount($sqliconn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css_files/main.css">
    <link rel="stylesheet" href="css_files/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- NAVIGATION BAR -->
    <?php include "header.php"; ?>

    <!-- BANNER SECTION -->
    <section id="banner-box">
        <div class="banner-text">
            <h1>Hi, <?php echo $_SESSION['user_name']; ?>. <br> This is the admin page.</h1>
        </div>
    </section>

    <!-- BODY SECTION -->
    <section id="interface-container">
        <div class="items-container">
            <div class = "interface-box">
                <h1>Total<br> Users</h1>
                <?php echo "$userscount"; 
                ?>
            </div>
            <img src="img/accountsicon.svg"></img>
        </div>

        <div class="items-container">
            <div class = "interface-box">
                <h1>Total<br> Products in Store</h1>
                <?php echo "$productscount"; 
                ?>
            </div>
            <img src="img/productsicon.svg"></img>
        </div>

        <div class="items-container">
            <div class = "interface-box">
                <h1>Total<br> Shipments</h1>
                <?php echo "$orderscount"; 
                ?>
            </div>
            <img src="img/shipmentsicon.svg"></img>
            </div>
        </div>
    </section>

    <section id="product-container">
        <h1>All products currently in store</h1>
        <div class = "product-box1">
            <div class="scrollable-div">
                <table>

                    <tr>
                        <th>productname</th>
                        <th>productinfo</th>
                        <th>price</th>
                        <th>stock</th>
                        <th>img</th>
                        <th>category</th>
                        <th>categoryID</th>
                    </tr>

                    <?php
                    $result = $sqliconn->query("SELECT * FROM products");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['product_name'] . "</td>";
                        echo "<td>" . $row['product_info'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td>" . $row['stock'] . "</td>";
                        echo "<td> <img style='width: 80px;' src='" . $row['img'] . "' alt='foto van product' /> </td>";
                        echo "<td>" . $row['category'] . "</td>";
                        echo "<td>" . $row['category_id'] . "</td>";
                        echo "<td> <a href='includes/admindelproduct.inc.php?product_id=" . $row['product_id'] . "'>Delete</a> </td>";
                        echo "</tr>";
                    }
                    ?>

                </table>
            </div>
        </div>
    </section>
    
    <section id="add-product-section">
        <div class = "product-box2">
            <h1>Add New Product</h1>
            <form method="post" action="includes/adminaddproduct.inc.php">
                <label for="product_name">Product Name:</label>
                <input type="text" name="product_name" required><br>

                <label for="product_info">Product Info:</label>
                <textarea name="product_info" required></textarea><br>
                        
                <label for="price">Price:</label>
                <input type="number" step="0.01" name="price" required><br>

                <label for="stock">Stock:</label>
                <input type="number" name="stock" required><br>

                <label for="img">Image URL:</label>
                <input type="text" name="img"><br>

                <label for="category">Category:</label>
                <input type="text" name="category" required><br>

                <label for="category">CategoryID:</label>
                <input type="text" name="categoryID" required><br>

                <button type="submit" name="submit">Submit when ready!</button>
            </form>
        </div>
    </section>

    <section>
        <div class = "product-box2">
            <h1>Category ID guidelines</h1>
            <p>categoryID 1 = Sweaters </p>
            <p>categoryID 2 = Shirts </p>
            <p>categoryID 3 = Pants </p>
            <p>categoryID 4 = Beanies </p>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include "footer.php"; ?>

</body>

</html>
