<?php
// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM products_tbl');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
$num_items_in_cart = isset($_SESSION['shopping_cart_tbl']) ? count($_SESSION['shopping_cart_tbl']) : 0;
?>
<style>
        /* Reset Styles */
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }

    /* Body Styles */
    body {
    font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
    font-size: 16px;
    line-height: 1.5;
    color: #333;
    }

    /* Header Styles */
    header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /* Navigation Styles */
    nav {
    display: flex;
    justify-content: center;
    align-items: center;
    }

    nav ul {
    display: flex;
    list-style: none;
    }

    nav ul li {
    margin-left: 20px;
    }

    nav ul li a {
    text-decoration: none;
    color: #333;
    transition: color 0.3s ease;
    }

    nav ul li a:hover {
    color: #007aff;
    }

    /* Main Styles */

    .main {
    background-color: #f2f2f2;
    }

    .featured {
    display: flex;
    flex-direction: column;
    background-repeat: no-repeat;
    background-size: cover;
    height: 500px;
    align-items: center;
    justify-content: center;
    text-align: center;
    }
    .products {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

    .product-wrapper {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    flex-wrap: wrap;
    padding: 50px;
    }

    .product {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: calc(33.33   % - 20px);
    margin-left: 130px;
    margin-right:130px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    transition: transform 0.3s ease-in-out;
    text-align: center;
    font-family: 'Roboto', sans-serif;
}

    .product:hover {
    transform: translateY(-10px);
    }

    .product img {
    display: block;
    height: 100%;
    margin: 0 auto;

}

    .product-info {
    padding: 20px;
    text-align: left;
    }

    .product .name {
    margin-top: 10px;
    font-weight: bold;
    font-size: 1.2rem;
    text-align: center;
}

.product .price {
    margin-top: 5px;
    font-size: 1.5rem;
    font-weight: bold;
    color: #007aff;
    text-align: center;
}

    .product-description {
    font-size: 1rem;
    color: #666;
    }

    .carousel-item img {
  height: 400px;
  width: 100%;
  object-fit: cover;
}
    /* Footer Styles */
    footer {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    footer p {
    font-size: 0.8rem;
    }

</style>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Home</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</head>
	<body>
        <header>
            <div class="content-wrapper">
                <h1 style="font-weight: bold;">Interstellar</h1>
                <nav>
                    <a href="index.php" style="text-decoration: none; color: #555555;">Home</a>
                    <a href="index.php?page=products" style="text-decoration: none; color: #555555;">Products</a>
                </nav>
                <div class="link-icons">
                    <a href="index.php?page=cart">
						<i class="fas fa-shopping-cart"></i><span><?=$num_items_in_cart?></span> 
					</a>
                </div>
            </div>
        </header>
        <main>
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="2000">
                <img src="imgs/watch.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
                </div>
                <div class="carousel-item">
                <img src="imgs/airpods_3rd_gen.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
                </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
            <div class="recentlyadded content-wrapper">
                <h2>Exclusive Products</h2>
                <div class="products">
                    <?php foreach ($recently_added_products as $product): ?>
                    <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
                        <img src="imgs/<?=$product['image_url']?>" width="200" height="200" alt="<?=$product['name']?>">
                        <span class="name"><?=$product['name']?></span>
                        <span class="price">
                            &#8369;<?=$product['price']?>
                        </span>
                    </a>
                    <?php endforeach; ?>
                </div>
                


            <?=template_footer()?>