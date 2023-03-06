<div class="form_container">
    <?php if (!empty($_SESSION['error'])) : ?>

        <div class="alert_error" role="alert">
            <?php echo $_SESSION['error'];
            unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>
    <div class="form">
        <h2>Me connecter à l'espace admin</h2>
        <?= $content; ?>
    </div>

</div>