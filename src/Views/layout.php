<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="public/js/app.js"></script>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/xma8wsg.css">
    <title>Document</title>
</head>

<body>

    <?php
    require 'elements/header_mobile.php';
    require 'elements/nav_desktop.php';
    ?>
    <main class="container">
        <?php require getRoute(); ?>

        <?php
        require 'elements/nav_mobile.php';
        ?>
    </main>

    <script src="public/js/ajax.js"></script>

</body>

</html>