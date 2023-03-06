<header class="hello_user">
    <?php if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) : ?>
        <p>Bonjour <span class="notice"><?= htmlspecialchars($firstname) ?></span>, de quoi avez-vous envie aujourd'hui ?</p>
    <?php else : ?>
        <p>Bienvenue au Fournil de Vergnée !</p>
    <?php endif; ?>
    <form class="search_box">
        <input type="text" id="search">
        <!-- <button type="submit" class="search_button"></button> -->
    </form>
</header>

<section>
    <div class="display" id="search_target">

    </div>
</section>

<section class="display">

    <div class="title">
        <h2>Tous nos Produits</h2>
        <img class="separator" src="public/assets/LIGNE.png" alt="">
    </div> 
    <!-- appel avec les getter -->
    <?php foreach ($products as $product) : ?>
        <div class="product_product-card" id="<?= htmlspecialchars($product->id) ?>">
            <img class="product_card-img" src="public/uploads/img_products/<?= htmlspecialchars($product->img) ?>" alt="<?= htmlspecialchars($product->img_alt) ?>">
            <h3><?= htmlspecialchars($product->name) ?></h3>
            <div class="product_infos">
                <p><?= htmlentities($product->size) ?></p>
                <a class="add addtocart" href="/fournil/index.php?page=addtocart&id=<?= htmlspecialchars($product->id) ?>">Commander</a>
                <p><?= htmlentities($product->price) ?>€</p>
            </div>
        </div>
    <?php endforeach ?>
</section>

