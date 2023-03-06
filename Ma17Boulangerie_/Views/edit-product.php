<div class="form_container">
    <?php if (!empty($_SESSION['success'])) : ?>

        <div class="alert_success" role="alert">
            <?php echo $_SESSION['success'];
            unset($_SESSION['success']); ?>
        </div>

    <?php endif; ?>

    <?php if (!empty($_SESSION['error'])) : ?>

        <div class="alert_error" role="alert">
            <?php echo $_SESSION['error'];
            unset($_SESSION['error']); ?>
        </div>

    <?php endif; ?>
    <div class="form">
        <h2>Modifier le produit</h2>
        <?= $content; ?>
    </div>
</div>