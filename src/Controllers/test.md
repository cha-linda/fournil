echo '<div class="product_product-card">' . '<img class="product_card-img" src="public/uploads/img_products/<?=' . ($product["img"]) . '?>' . 'alt="<?=' . ($product["img_alt"]) . '?>">' . '<h3><?=' . ($product["name"]) . '?></h3>' . '<div class="product_infos">' . '<p><?=' . $product["size"] . '?></p>' . '<a class="add" href="/fournil/index.php?page=add-product?id=<?=' . $product["id"] . '?>">Commander</a>' . '<p><?= ' . ($product["price"]) . '?>€</p></div>';




<section class="display">

    <div class="title">
        <h2>Nos Produits</h2>
        <img class="separator" src="public/assets/LIGNE.png" alt="">
    </div>
    <?php foreach ($products as $product) : ?>
        <div class="product_product-card">
            <img class="product_card-img" src="public/uploads/img_products/<?= htmlspecialchars($product->img) ?>" alt="<?= htmlspecialchars($product->img_alt) ?>">
            <h3><?= $product->name ?></h3>
            <div class="product_infos">
                <p><?= $product->size ?></p>
                <a class="add" href="/fournil/index.php?page=add-product?id=<?= htmlspecialchars($product->id) ?>">Commander</a>
                <p><?= $product->price ?>€</p>
            </div>
        </div>
    <?php endforeach ?>
</section>
