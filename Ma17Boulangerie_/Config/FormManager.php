<?php

namespace App\Config;

use App\Config\Form;
use App\Models\UsersModel;
use App\Models\ProductsModel;

class FormManager
{

    static function loginAdmin()
    {
        ## Vérifie si le formulaire est complet
        if (Form::validate($_POST, ['email', 'password'])) {
            ## Recherche l'utilisateur dans la table en fonction de son email.
            $usersModel = new UsersModel;
            $userArray = $usersModel->findOneByEmail(strip_tags($_POST['email']));

            ## User n'existe pas
            if (!$userArray) {
                $_SESSION['error'] = 'L\'adresse e-mail et/ou le mot de passe sont incorrects';
                header('Location: /fournil/Ma17Boulangerie_/index.php?page=sign-in');
                exit;
            }

            ## User existe, stocke ses données dans un tableau
            $user = $usersModel->hydrate($userArray);

            ## Vérifie le rôle de l'utilisateur
            $userRole = $usersModel->getRole();

            if ($userRole != 1) {
                $_SESSION['error'] = 'Les infos fournies sont incorrectes.';
                header('Location: /fournil/Ma17Boulangerie_/index.php?page=login-admin');
                exit;
            }

            ## password_verify ne fonctionne que sur les mots de passe qui ont été chiffrés
            if (password_verify($_POST['password'], $user->getPassword())) {
                ## Password ok ---> création de session
                $user->setSession();
                $_SESSION['admin-session'] = true;
                header('Location: /fournil/Ma17Boulangerie_/index.php?page=admin');
                exit;
            } else {
                ## Password faux ----> message d'erreur
                $_SESSION['error'] = 'L\'adresse e-mail et/ou le mot de passe est incorrect';
                header('Location: /fournil/Ma17Boulangerie_/index.php?page=login-admin');
                exit;
            }
        }

        $form = new Form;
        $form->startForm()
            ->addLabel('email', 'E-mail')
            ->addInput('email', 'email')
            ->addLabel('password', 'Mot de passe')
            ->addInput('password', 'password')
            ->addButton('Me connecter', ['class' => 'general_button'])
            ->endForm();
        return $form->create();
    }



    static function logoutAdmin()
    {
        unset($_SESSION['admin-session']);
        unset($_SESSION['user']);
        header('Location: /fournil/index.php?page=home');
        exit;
    }



    static function addProduct()
    {
        
        if (Form::validate($_POST, ['name', 'description', 'size', 'img_alt', 'price']) && Form::checkFile($_FILES['img']) == true) {
        
            $tmpName = $_FILES['img']['tmp_name'];

            if (strlen($tmpName) != 0) {
                $img = strip_tags($_FILES['img']['name']);
            } else {
                $img = 'random.jpg';
            }

            $name = strip_tags($_POST['name']);
            $description = strip_tags($_POST['description']);
            $size = strip_tags($_POST['size']);
            $img_alt = strip_tags($_POST['img_alt']);
            $price = strip_tags($_POST['price']);

            $product = new ProductsModel;

            $product->setName($name)
                ->setDescription($description)
                ->setSize($size)
                ->setImg($img)
                ->setImgAlt($img_alt)
                ->setPrice($price);


            $product->create($product);

            $tmpName = $_FILES['img']['tmp_name'];
            move_uploaded_file($tmpName, '../public/uploads/img_products/'. $img);

            header('Location: /fournil/Ma17Boulangerie_/index.php?page=admin');
        }



        $form = new Form;

        $form->startForm('post', '#', ['enctype' => 'multipart/form-data'])
            ->addLabel('name', 'Nom')
            ->addInput('text', 'name', ['id' => 'name'])
            ->addLabel('description', 'Description')
            ->addInput('text', 'description', ['id' => 'description'])
            ->addLabel('size', 'Poids')
            ->addInput('text', 'size', ['id' => 'size'])
            ->addLabel('img', 'Image')
            ->addInput('file', 'img', ['id' => 'img'])
            ->addLabel('alt_img', 'Texte alternatif de l\'image')
            ->addInput('text', 'img_alt', ['id' => 'name'])
            ->addLabel('price', 'Prix')
            ->addInput('text', 'price', ['id' => 'price'])
            ->addButton('Créer', ['class' => 'general_button'])
            ->endForm();

        return $form->create();


    }

    static function editProduct(int $id)
    {
        $product = new ProductsModel;
        $currentProduct = $product->find($id);

        if (Form::validate($_POST, ['name', 'description', 'size', 'price', 'img_alt']) && Form::checkFile($_FILES['img']) == true) {

            $tmpName = $_FILES['img']['tmp_name'];

            if (strlen($tmpName) != 0) {
                $img = strip_tags($_FILES['img']['name']);
            } else {
                $img = $currentProduct->img;
            }

                
                $name = strip_tags($_POST['name']);
                $description = strip_tags($_POST['description']);
                $size = strip_tags($_POST['size']);
                $price = strip_tags($_POST['price']);
                $img_alt = strip_tags($_POST['img_alt']);

                $productEdit = new ProductsModel;

                $productEdit->setId($currentProduct->id)
                    ->setName($name)
                    ->setDescription($description)
                    ->setSize($size)
                    ->setImg($img)
                    ->setImgAlt($img_alt)
                    ->setPrice($price);

                $productEdit->update();

                move_uploaded_file($tmpName, '../public/uploads/img_products/'. $img);

                $_SESSION['success'] = 'Le produit a été modifié avec succès.';
                header('Location: /fournil/Ma17Boulangerie_/index.php?page=admin');
                exit;
                
            } else {
                $_SESSION['error'] = 'Les informations rentrées sont incorrectes';
            }
        
            // var_dump($currentProduct->img);
            // var_dump($_FILES);
            
$form = new Form;
        $form->startForm('post', '#', ['enctype' => 'multipart/form-data'])
            ->addLabel('name', 'Nom')
            ->addInput('text', 'name', ['value' => $currentProduct->name])
            ->addLabel('description', 'Description')
            ->addInput('text', 'description', ['value' => $currentProduct->description])
            ->addLabel('size', 'Poids')
            ->addInput('text', 'size', ['value' => $currentProduct->size])
            ->addLabel('img', 'Image')
            ->addInput('file', 'img', ['value' => $currentProduct->img])
            ->addLabel('alt_img', 'Texte alternatif de l\'image')
            ->addInput('text', 'img_alt', ['value' => $currentProduct->img_alt])
            ->addLabel('price', 'Prix')
            ->addInput('text', 'price', ['value' => $currentProduct->price])
            ->addButton('Modifier', ['class' => 'general_button'])
            ->endForm();

        return $form->create();
    }
}
