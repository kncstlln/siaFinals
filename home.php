<?php
// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM products_tbl');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Home')?>

<div class="featured">
    <h2>Essentials</h2>
    <p>Your imagination is the limit</p>
</div>
<div class="recentlyadded content-wrapper">
    <h2>Exclusive Products</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <img src="imgs/<?=$product['image_url']?>" width="200" height="200" alt="<?=$product['name']?>">
            <span class="name"><?=$product['name']?></span>
            <span class="price">
                &dollar;<?=$product['price']?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>


<?=template_footer()?>