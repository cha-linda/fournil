<?php
require '../../vendor/autoload.php';

use App\Config\Database;

$db = Database::getInstance();

$content = file_get_contents("php://input");
$data = json_decode($content, true);

$search = "%" . $data['textToFind'] . "%"; //  %tarte%


$sth = $db->prepare('SELECT * FROM products WHERE name LIKE :find ORDER BY id DESC');
$sth->bindValue('find', $search, $db::PARAM_STR); // On protège car le text à recherche vient de l'utilisateur.
$sth->execute();
$prod_found = $sth->fetchAll($db::FETCH_ASSOC);

// var_dump($prod_found);
// var_dump($data['textToFind']);

if(($data['textToFind']) != "") {
    if(!empty($prod_found)) {
        foreach($prod_found as $prod) {
        echo '<div class="product_product-card">';
            echo '<img class="product_card-img" src="public/uploads/img_products/' . htmlspecialchars($prod['img']) . '">';
            echo '<h3>' . htmlspecialchars($prod['name']) . '</h3>';
            echo '<div class="product_infos">';
                echo '<p>' . htmlspecialchars($prod['size']) . '</p>';
                echo '<a href="/fournil/index.php?page=addtocart&id=' .  htmlspecialchars($prod['id']) . '" class="add">Commander</a>';
                echo '<p>' . htmlspecialchars($prod['price']) . '€</p>';
            echo "</div>";
        echo "</div>";
    }} else {
        echo '<div class="title"><p style="font-size: 1.5rem; color: #73260d">Aucun produit ne correspond à votre recherche.</p></div>';
    }
}

