<?php
namespace App\Config;

## On "importe" PDO
use PDO;
use PDOException;

class Database extends PDO
{
    ## Instance unique de la classe
    private static $instance;

    ## Infos de connexions
    private const DBHOST = 'localhost';
    private const DBUSER = 'root';
    private const DBPASS = '';
    private const DBNAME = 'fournil_vergnee';

    private function __construct()
    {
        ## Concat des données nécessaires à la connexion à la base
        $_dsn = 'mysql:dbname='. self::DBNAME . ';host=' . self::DBHOST . ';charset=utf8';

        ## Constructeur de la classe PDO
        try{
            parent::__construct($_dsn, self::DBUSER, self::DBPASS);

            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    ## crée une instance si elle n'existe pas, la renvoie si elle existe.
    ## self renvoie à la classe Database alors que this (plus haut) fait référence à un objet, défini dans une variable.
    public static function getInstance():self
    {
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function connect() {
        echo 'ça marche';
    }
}