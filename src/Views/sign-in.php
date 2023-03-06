<div class="form_container">
    <?php if (!empty($_SESSION['error'])) : ?>

        <div class="alert_error" role="alert">
            <?php echo $_SESSION['error'];
            unset($_SESSION['error']); ?>
        </div>

    <?php endif; ?>

    <?php if (!empty($_SESSION['new-user'])) : ?>

        <div class="alert_success" role="alert">
            <?php echo $_SESSION['new-user'];
            unset($_SESSION['new-user']); ?>
        </div>

    <?php endif; ?>

    <?php if (!empty($_SESSION['notice-cart'])) : ?>

        <div class="alert_notice" role="alert">
            <?php echo $_SESSION['notice-cart'];
            unset($_SESSION['notice-cart']); ?>
        </div>

    <?php endif; ?>


    <div class="form">
        <h2>Connexion</h2>
        <?= $content; ?>
    </div>
    <a class="in_links" href="/fournil/index.php?page=sign-up">Je suis nouveau/elle par ici, je veux m'inscrire</a>
</div>