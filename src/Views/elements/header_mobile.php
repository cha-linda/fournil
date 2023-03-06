<nav class="nav_mobile">

    <img src="public/assets/LOGO IMG.png" alt="logo-fournil-de-vergnee">
    <h1>Le Fournil de Vergnée</h1>
    
    <?php if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) : ?>

                    <a href="/fournil/index.php?page=cart">
                        <div class="cart">
                            <img src="public/assets/nav_order-icon.png" alt="">
                            <?php if (!empty($_SESSION['cart'])) : ?>
                                <div class="cart_separator">
                                    <p class="cart_count"><?= htmlentities(array_sum($_SESSION['cart'])); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </a>
            <?php endif; ?>

</nav>