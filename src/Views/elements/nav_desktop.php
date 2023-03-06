<nav class="nav_desktop">
    <div class="nav_site-logo">
        <a href="/fournil/index.php?page=home"><img src="public/assets/LOGO IMG.png" alt="logo-fournil-de-vergnee"></a>
        <h1>Le Fournil<br>de Vergnée</h1>
    </div>
    <div class="nav_menu">
        <ul>
            <?php if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) : ?>
                <li>
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
                </li>
                <li><a href="/fournil/index.php?page=edit-profile">Mon Profil</li>
                <li><a href="/fournil/index.php?page=logout">Déconnexion</a></li>
            <?php else : ?>
                <li><a href="/fournil/index.php?page=sign-in">M'inscrire/Me connecter</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>