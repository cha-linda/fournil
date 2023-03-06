<?php

namespace App\Config;

use App\Config\Form;
use App\Models\ProductsModel;
use App\Models\UsersModel;

class FormManager
{

    public static function login()
    {
        ## Vérifie si le formulaire est complet
        if (Form::validate($_POST, ['email', 'password'])) {
            ## Recherche l'utilisateur dans la table en fonction de son email.
            $usersModel = new UsersModel;
            $userArray = $usersModel->findOneByEmail(strip_tags($_POST['email']));

            ## User n'existe pas
            if (!$userArray) {
                $_SESSION['error'] = 'L\'adresse e-mail et/ou le mot de passe sont incorrects';
                header('Location: /fournil/index.php?page=sign-in');
                exit;
            }

            ## User existe, stocke ses données dans un tableau
            $user = $usersModel->hydrate($userArray);

            ## password_verify ne fonctionne que sur les mots de passe qui ont été chiffrés
            if (password_verify($_POST['password'], $user->getPassword())) {
                ## Password ok ---> création de session
                $user->setSession();
                header('Location: /fournil/index.php?page=home');
                exit;
            } else {
                ## Password faux ----> message d'erreur
                $_SESSION['error'] = 'L\'adresse e-mail et/ou le mot de passe est incorrect';
                header('Location: /index.php?page=sign-in');
                exit;
            }
        }

        $form = new Form;
        $form->startForm()
            ->addLabel('email', 'E-mail')
            ->addInput('email', 'email', ['id' => 'email'])
            ->addLabel('pass', 'Mot de passe')
            ->addInput('password', 'password', ['id' => 'password'])
            ->addButton('Me connecter', ['class' => 'general_button'])
            ->endForm();
        return $form->create();
    }

    static function logout()
    {
        unset($_SESSION['user']);
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
        header('Location: /fournil/index.php?page=home');
        exit;
    }

    static function register()
    {
        ## On vérifie si le formulaire est valide
        if (Form::validate($_POST, ['name', 'firstname', 'email', 'password'])) {
            ## Le formulaire est valide
            ## On nettoie les entrées
            $name = strip_tags($_POST['name']);
            $firstname = strip_tags($_POST['firstname']);
            $email = strip_tags($_POST['email']);

            ## On chiffre le mot de passe
            $password = password_hash($_POST['password'], PASSWORD_ARGON2I);

            ## On hydrate l'utilisateur
            $user = new UsersModel;

            $user->setName($name)
                ->setFirstname($firstname)
                ->setEmail($email)
                ->setPassword($password);

            ## On stocke l'utilisateur
            $user->create($user);
            $_SESSION['new-user'] = 'Votre inscription a bien été enregistrée. Veuillez vous connecter.';
            header('Location: /fournil/index.php?page=sign-in');
        }

        $form = new Form;

        $form->startForm()
            ->addLabel('name', 'Nom')
            ->addInput('text', 'name', ['id' => 'email'])
            ->addLabel('firstname', 'Prénom')
            ->addInput('text', 'firstname', ['id' => 'email'])
            ->addLabel('email', 'E-mail')
            ->addInput('email', 'email', ['id' => 'email'])
            ->addLabel('password', 'Mot de passe :')
            ->addInput('password', 'password', ['id' => 'pass'])
            ->addButton('M\'inscrire', ['class' => 'general_button'])
            ->endForm();

        return $form->create();
    }

    static function checkout() {

        if (!empty($_SESSION['user'])) {
            $userModel = new UsersModel;
            $user = $userModel->find($_SESSION['user']['id']);
        }

        $form = new Form;

        $form->startForm()
            ->addLabel('name', 'Nom')
            ->addInput('text', 'name', ['value' => $user->name])
            ->addLabel('firestname', 'Prénom')
            ->addInput('text', 'firstname', ['value' => $user->firstname])
            ->addLabel('pickup', 'Lieu de retrait de la commande')
            ->addSelect('select',  ['Marché du Seure', 'Marché de Villars', 'Biocoop de St Jean d\'Angely'])
            ->addLabel('date', 'Date')
            ->addInput('date', 'date', ['id' => 'pass'])
            ->addButton('Valider', ['class' => 'general_button'])
            ->endForm();

        return $form->create();
    }

}
