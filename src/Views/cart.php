<section class="cart_display">

    <div class="title">
        <h2>Ma commande</h2>
        <img class="separator" src="public/assets/LIGNE.png" alt="">
    </div>

    <?php if (empty($_SESSION['cart'])) : ?>
        <p class="alert_notice">Votre panier est vide</p>
        <a href="/fournil/index.php?page=home">Retourner sur la page d'accueil</a>
    <?php else : ?>

        <a href="/fournil/index.php?page=cart&cancel">Annuler ma commande</a>
        <?php foreach ($products as $product) : ?>
            <div class="cart_line">
                <img class="cart_img" src="public/uploads/img_products/<?= htmlentities($product->img); ?>" alt="<?= htmlentities($product->img_alt); ?>">
                <h3><?= htmlentities($product->name); ?></h3>
                <p class="cart_count"><?= htmlentities($_SESSION['cart'][$product->id]) ?></p>
                <a href="index.php?page=cart&del=<?= htmlentities($product->id); ?>" class="cart_button"><img src="public/assets/cart_del-icon.png" alt="del-icone"></a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</section>

<section class="cart_display">
    <div class="title">
        <h2>Confirmer ma commande</h2>
        <img class="separator" src="public/assets/LIGNE.png" alt="">
    </div>

    <div class="form_container">
        <div class="form">
            <?= $infos ?>
        </div>
    </div>
</section>