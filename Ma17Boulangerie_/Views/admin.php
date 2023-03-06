<?php if ($_SESSION['admin-session'] == true) : ?>
    <?php require 'elements/header.php'; ?>
    <section>
        <div class="title">
            <img class="separator" src="../public/assets/LIGNE.png" alt="">
        </div>
    </section>
    <section class="display">
        <?php foreach ($products as $product) : ?>

            <div class="product_product-card">
                <img class="product_card-img" src="../public/uploads/img_products/<?= htmlentities($product->img) ?>" alt="<?= htmlentities($product->img_alt) ?>">
                <h3><?= $product->name ?></h3>
                <div class="product_infos">
                    <a class="add" href="?page=edit-product&id=<?= htmlentities($product->id) ?>">Modifier</a>
                    <a class="add" href="?page=delete-product&id=<?= htmlentities($product->id) ?>">Supprimer</a>
                </div>
            </div>
        <?php endforeach ?>
    </section>

    </div>

<?php else : ?>

    <div class="form_container">
        <div class="alert_error" role="alert">
            <?= 'Vous devez vous identifier pour accéder à cette page.' ?>
        </div>

        <div class="form">
            <h2>M'identifier comme admin'</h2>
            <?= $content; ?>
        </div>
    </div>

<?php endif; ?>