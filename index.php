<?php
    $url = 'https://titan.csit.rmit.edu.au/~e103884/wp/.services/.orders/';
    $json = file_get_contents($url);
    $data = json_decode($json, true);
?>
<?php require_once('fragment/head.php');?>
<title>Index Page</title>
</head>
<body>
    <div class="grid-container">
        <header>
            Index Page
        </header>
    <main>
        <section id="orders">
            <h1>Order</h1>
            <div>
                <table>
                    <tr>
                        <td>Order ID</td>
                        <td>Order Date</td>
                        <td>Customer Name</td>
                        <td>Delivery Address</td>
                        <td>Delivered Date</td>
                    </tr>
                <?php 
                    foreach($data as $i) {
                        echo "<tr>";
                        echo "<td>".$i['orderID']."</td><td>".$i['orderDate']."</td><td>".$i['customerName']."</td><td>".$i['deliveryAddress']."</td><td>".$i['deliveredDate']."</td>"; 
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