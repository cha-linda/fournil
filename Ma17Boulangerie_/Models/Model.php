<?php
namespace App\Models;

use App\Config\Database;

## Gère les différents types de requètes de manip de base de données => C.R.U.D.

class Model extends Database {
    
    protected $table;
    private $Database;

    public function findAll()
    {
        $query = $this->queryType('SELECT * FROM ' . $this->table);
        return $query->fetchAll();
    }

    public function queryType(string $sql, array $attributs = null)
    {
        ## on récupère l'instance du singleton Database
        $this->Database = Database::getInstance();

        if($attributs !== null) {
            ## Si attr, requête préparée
            $query = $this->Database->prepare($sql);
            $query->execute($attributs);
            return $query;
        }else{
            ## Sinon requète simple
            return $this->Database->query($sql);
        }
    }

    public function find(int $id)
    {
        return $this->queryType("SELECT * FROM {$this->table} WHERE id = ?",[$id])->fetch();
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

    public function update()
    {
        $champs = [];
        $valeurs = [];

        // On boucle pour éclater le tableau
        foreach ($this as $champ => $valeur) {
            // UPDATE annonces SET titre = ?, description = ?, actif = ? WHERE id= ?
            if ($valeur !== null && $champ != 'Database' && $champ != 'table') {
                $champs[] = "$champ = ?";
                $valeurs[] = $valeur;
            }
        }
        $valeurs[] = $this->id;

        // On transforme le tableau "champs" en une chaine de caractères
        $liste_champs = implode(', ', $champs);

        // On exécute la requête
        return $this->queryType('UPDATE ' . $this->table . ' SET ' . $liste_champs . ' WHERE id = ?', $valeurs);
    }



    public function delete(int $id)
    {
        return $this->queryType("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }


    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            ## On récupère le nom du setter correspondant à la clé (key)
            ## titre -> setTitre
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