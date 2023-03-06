<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/back.css">
    <title>Document</title>
</head>

<body>

    <main class="container">
        <div class="leftbar">
            <a href="?page=admin"><img class="logo" src="assets/logo.png" alt="logo du fournil"></a>
            <?php if (!empty($_SESSION['admin-session'])) : ?>
                <div class="leftbar_menu">
                    <a href="?page=create-product">Créer un nouveau produit</a>
                    <a href="#">Gérer les utilisateurs</a>
                    <a href="#">Gérer les commandes</a>
                </div>
            <?php endif; ?>
        </div>

        <div class="mainspace">
            <?php require getRoute(); ?>
        </div>
    </main>

</body>

</html>