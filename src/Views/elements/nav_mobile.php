<div id="mobile_drop">
        <div id="nav_drop">
            <h2 class="white_title">Menu</h2>
            <div class="nav_mobile_menu">
            <?php if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) : ?>
                <p><a class="nav_mobile_title" href="#">Mon Profil</li>
                <p><a class="nav_mobile_title" href="/fournil/index.php?page=logout">Déconnexion</a></p>
            <?php else: ?>
                <p><a class="nav_mobile_title" href="/fournil/index.php?page=sign-in">M'inscrire/Me connecter</a></p>
            <?php endif; ?>
            </div>
        </div>
    </div>