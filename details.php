<?php
    $orderNum = '';
    $active = 'inactive';
    $err = '';
    if(isset($_POST['orderSubmit'])) {
        $orderNum = $_POST['orderNum'];
        $url = "https://titan.csit.rmit.edu.au/~e103884/wp/.services/.orders/?id=".$orderNum;
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        $orderNum = "#".$orderNum;
    }
    if(isset($data)) {
        $orderDate = strtoupper($data['orderDate']);
        $cusName = strtoupper($data['customerName']);
        $address = strtoupper($data['deliveryAddress']);
        $deliveredDate = strtoupper($data['deliveredDate']);
        $products = $data['products'];
        $active = "active";
    } else {
        $err = 'Order not exist';
    }
?>
<?php require_once('fragment/head.php');?>
<title>Order Details Page</title>
</head>
<body>
    <div class="grid-container">
        <header>
            Order Details Page
        </header>
    <main>
        <section id="order">
            <h1>Order <?php echo $orderNum?></h1>
            <div>
                <form method="POST">
                    <div><h3>Search for order number</h3></div>
                    <div><input type="text" name="orderNum" id="orderNum" value="<?php echo isset($_POST['orderNum']) ? $_POST['orderNum'] : '' ?>"></div>
                    <div><input type="submit" name="orderSubmit" value="Submit"></div>
                </form>
            </div>                
            <div class="error"><h3><?php echo $err;?></h3></div>
            <div id="orderDetails" class="<?php echo $active;?>">

                <div><h3>Order Date: </h3><?php echo $orderDate;?></div>
                <div><h3>Customer Name: </h3><?php echo $cusName;?></div>
                <div><h3>Delivery Address: </h3><?php echo $address;?></div>
                <div><h3>Deliverd Date: </h3><?php echo $deliveredDate;?></div>
                <table>
                    <tr>
                        <td>Product Name</td>
                        <td>Price</td>
                        <td>Quantity</td>
                    </tr>
                    <?php 
                    foreach($products as $i) {
                        echo "<tr>";
                        echo "<td>".$i['name']."</td><td>".$i['price']."</td><td>".$i['quantity']."</td>"; 
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </section>
        <?php require_once('sitemap.php');?>
    </main>
<?php require_once('fragment/footer.php');?>
<script src="js/script.js" type="text/javascript"></script>
</html>