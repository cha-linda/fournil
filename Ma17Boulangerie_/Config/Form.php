<?php

namespace App\Config;

class Form
{

    private $formCode = '';

    public function create()
    {
        return $this->formCode;
    }


    ## Valide si tous les champs proposés sont remplis
    ## $form Tableau issu du formulaire ($_POST, $_GET)
    ## $keys Tableau listant les champs obligatoires
    ## Return un booléen


    public static function validate(array $form, array $keys)
    {
        foreach ($keys as $key) {
            ## Si le champ est absent ou vide dans le formulaire
            if (!isset($form[$key]) || empty($form[$key])) {
                ## On sort en retournant false
                return false;
            }
        }
        return true;
    }


    public static function checkFile(array $file)
    {
        ## On stocke les données de $_FILES dans des variables
        $tmpName = $file['tmp_name'];
        $filename = $file['name'];
        $type = $file['type'];
        $size = $file['size'];
        $error = $file['error'];

        ## On isole l'extension de "file".
        $extensionArray = explode('.', $filename);
        $extension = strtolower(end($extensionArray));

        if (strlen($tmpName) == 0) {
            return true;
        }

        if (strlen($tmpName) != 0) {

            ## les différentes caractéristiques à tester
            $extensions = ['jpg', 'png', 'jpeg'];
            $maxSize = 500000;
            $mimes = [
                'png'   => 'image/png',
                'jpeg'  => 'image/jpeg',
                'jpg'   => 'image/jpeg',
                'gif'   => 'image/gif',
                'bmp'   => 'image/bmp',
                'ico'   => 'image/vnd.microsoft.icon',
                'tiff'  => 'image/tiff',
                'tif'   => 'image/tiff',
                'svg'   => 'image/svg+xml',
                'svgz'  => 'image/svg+xml',
            ];

            // var_dump(in_array($type, $mimes));
            // var_dump(in_array($extension, $extensions));

            if (in_array($extension, $extensions) == true && $size <= $maxSize && $error == 0 && in_array($type, $mimes) == true) {
                return true;
            } else {
                return false;
            }
        }
    }



    ## $attributs Tableau associatif ['class' => 'form-control', 'required' => true]
    ## Return une string

    private function addAttributes(array $attributes): string
    {
        ## On initialise une chaîne de caractères
        $str = '';

        ## On liste les attributs "courts" utilisables sur les input
        $shorts = ['checked', 'disabled', 'readonly', 'multiple', 'required', 'autofocus', 'novalidate', 'formnovalidate'];

        // On boucle sur le tableau d'attributs
        foreach ($attributes as $attribute => $value) {
            // Si l'attribut est dans la liste des attributs courts
            if (in_array($attribute, $shorts) && $value == true) {
                $str .= " $attribute";
            } else {
                // On ajoute attribut='valeur'
                $str .= " $attribute=\"$value\"";
            }
        }

        return $str;
    }
    ## <form>
    ## $methode = post ou get
    ## $action = Action du formulaire
    ## Return Form

    public function startForm(string $methode = 'post', string $action = '#', array $attributes = []): self
    {
        $this->formCode .= "<form action='$action' method='$methode'";

        ## Ajout des attributs : si on a des attributs, alors(?) on ajoute des attributs (TERNAIRE)
        $this->formCode .= $attributes ? $this->addAttributes($attributes) . '>' : '>';

        return $this;
    }

    ## </form>
    ## Return Form

    public function endForm(): self
    {
        $this->formCode .= '</form>';
        return $this;
    }

    ## label et attributs
    ## return Form

    public function addLabel(string $for, string $text, array $attributes = []): self
    {
        $this->formCode .= "<label for='$for'";
        $this->formCode .= $attributes ? $this->addAttributes($attributes) : '';
        $this->formCode .= ">$text</label>";

        return $this;
    }

    ## Ajout input

    public function addInput(string $type, string $name, array $attributes = []): self
    {
        $this->formCode .= "<input type='$type' name='$name'";
        $this->formCode .= $attributes ? $this->addAttributes($attributes) . '>' : '>';

        return $this;
    }

    public function addTextarea(string $name, string $value = '', array $attributes = []): self
    {
        $this->formCode .= "<textarea name='$name'";
        $this->formCode .= $attributes ? $this->addAttributes($attributes) : '';
        $this->formCode .= ">$value</textarea>";

        return $this;
    }


    public function addSelect(string $name, array $options, array $attributes = []): self
    {
        $this->formCode .= "<select name='$name'";
        $this->formCode .= $attributes ? $this->addAttributes($attributes) . '>' : '>';

        foreach ($options as $value => $text) {
            $this->formCode .= "<option value=\"$value\">$text</option>";
        }

        $this->formCode .= '</select>';

        return $this;
    }


    public function addButton(string $text, array $attributes = []): self
    {
        $this->formCode .= '<button ';
        $this->formCode .= $attributes ? $this->addAttributes($attributes) : '';
        $this->formCode .= ">$text</button>";

        return $this;
    }
}
