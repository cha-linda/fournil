<?php
namespace App\Models;

use App\Config\Database;

## Gère les différents types de requètes de manip de base de données => C.R.U.D.

class Model extends Database {
    
    protected $table;
    private $Database;

    public function queryType(string $sql, array $attributes = null)
    {
        ## on récupère l'instance du singleton Database
        $this->Database = Database::getInstance();
            $query = $this->Database->prepare($sql);
            $query->execute($attributes);
            return $query;
    }

    public function findAll()
    {
        $query = $this->queryType('SELECT * FROM ' . $this->table);
        return $query->fetchAll();
    }

        public function find(int $id)
    {
        return $this->queryType("SELECT * FROM {$this->table} WHERE id =?", [$id])->fetch();
    }


    public function create(Model $model)
    {
        $keys = [];
        $questmark = [];
        $values = [];

        ## On boucle pour éclater le tableau
        foreach ($model as $key => $value) {
            ## INSERT INTO ma-table (key 1, key 2, etc.) VALUES (?, ?, ?)
            if ($value !== null && $key != 'Database' && $key != 'table') {
                $keys[] = $key;
                $questmark[] = "?";
                $values[] = $value;
            }
        }

        ## On transforme le tableau "key_list" en une chaine de caractères
        $key_list = implode(', ', $keys);
        $questmark_list = implode(', ', $questmark);

        ## On exécute la requête
        return $this->queryType('INSERT INTO ' . $this->table . ' (' . $key_list . ')VALUES(' . $questmark_list . ')', $values);
    }



    public function delete(int $id)
    {
        return $this->queryType("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }

    public function display() {

        $ids = array_keys($_SESSION['cart']);
        return $this->queryType('SELECT * FROM products WHERE id IN ('.implode(',', $ids).')');
    }


    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            ## On récupère le nom du setter correspondant à la clé (key)
            ## Ex : name -> setName
            $setter = 'set' . ucfirst($key);

            ## On vérifie si le setter existe
            if (method_exists($this, $setter)) {
                ## On appelle le setter
                $this->$setter($value);
            }
        }
        return $this;
    }
}