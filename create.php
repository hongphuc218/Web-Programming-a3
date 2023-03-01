<?php require_once('fragment/head.php');?>
<title>Create Product Page</title>
</head>
<body>
    <div class="grid-container">
        <header>
            Create Order Page
        </header>
<?php require_once('functions.php');?>
    <main>
        <section id='form'>
            <div>
                <form method="POST">
                    <h1>Form</h1>
                    <div>
                        <label for="id">Product ID: </label>
                        <input type="text" name="id" id="id" value="<?php echo isset($_POST['id']) ? $_POST['id'] : '' ?>">
                        <span class="error"><?php echo $idErr;?></span>
                    </div>
                    <div>
                        <label for="name">Name: </label>
                        <input type="text" name="name" id="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>">
                        <span class="error"><?php echo $nameErr;?></span>
                    </div>
                    <div>
                        <label for="price">Price: </label>
                        <input type="text" name="price" id="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : '' ?>">
                        <span class="error"><?php echo $priceErr;?></span>
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Submit">
                    </div>
                </form>
            </div>
        </section>
        <?php require_once('sitemap.php');?>
    </main>
    <?php require_once('fragment/footer.php');?>
</html>