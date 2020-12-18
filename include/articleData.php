<?php
class article {
    public $h1;
    public $chap;
    public $dossier;
    public $para;
    public $titre;
    public $auteur;
    public $id;
    public $id_art;
    public $id_art_up;
    function modifier($p, $n, $y, $t, $l ,$a) {
        $this->h1 = $p;
        $this->chap = $n;
        $this->dossier = $y;
        $this->para = $t;
        $this->titre = $l;
        $this->auteur = $a;
    }
    function updatearticle($p, $n, $y, $t, $l ,$a, $b) {
        $this->h1 = $p;
        $this->chap = $n;
        $this->dossier = $y;
        $this->para = $t;
        $this->titre = $l;
        $this->auteur = $a;
        $this->id_art_up = $b;
    }
// Inserer des éléments dans la table Article
    function createart($dbh) {
        
        $sql = 'INSERT INTO Article (h1_art, chap_art, media_art, para_art, titre_art, auteur_art) VALUES (:h1, :chap, :media_art, :para_art, :titre_art, :auteur_art);';
        
        // préparation de la requête
        $query = $dbh->prepare($sql);
        // on donne une valeur aux paramètres à partir des attributs de l'objet courant
        $query->bindValue(':h1', $this->h1, PDO::PARAM_STR);
        $query->bindValue(':chap', $this->chap, PDO::PARAM_STR);
        $query->bindValue(':media_art', $this->dossier, PDO::PARAM_STR);
        $query->bindValue(':para_art', $this->para, PDO::PARAM_STR);
        $query->bindValue(':titre_art', $this->titre, PDO::PARAM_STR);
        $query->bindValue(':auteur_art', $this->auteur, PDO::PARAM_STR);
        $query->execute();   
      
    }

// Afficher les articles
function updateart($dbh) {
    
    $sql = 'UPDATE Article SET h1_art = :h1 , chap_art = :chap, media_art = :media, para_art = :para, titre_art = :titre, auteur_art = :auteur WHERE id_art = :id;';

    $query = $dbh->prepare($sql);
    $query->bindValue(':h1', $this->h1, PDO::PARAM_STR);
    $query->bindValue(':chap', $this->chap, PDO::PARAM_STR);
    $query->bindValue(':media', $this->dossier, PDO::PARAM_STR);
    $query->bindValue(':para', $this->para, PDO::PARAM_STR);
    $query->bindValue(':titre', $this->titre, PDO::PARAM_STR);
    $query->bindValue(':auteur', $this->auteur, PDO::PARAM_STR);
    $query->bindValue(':id', $this->id_art_up, PDO::PARAM_INT);
    $query->execute();
}
    static function readType($dbh, $categorie) {
        $sql= 'SELECT * FROM Article WHERE titre_art = :valeur
        ORDER BY titre_art';
        $query = $dbh->prepare($sql);
        $query->bindValue(':valeur', $categorie, PDO::PARAM_STR);
        $query->execute();
        $objet = $query->fetchAll(PDO::FETCH_CLASS,'article');
        return $objet;
    }

      static function readall($dbh) {
        $sql= 'SELECT DISTINCT titre_art  FROM Article
        ORDER BY titre_art';
        $query = $dbh->prepare($sql);
        $query->execute();
        $objet = $query->fetchAll(PDO::FETCH_CLASS,'article');
        return $objet;
    }

    static function readTitre($dbh) {
        $sql= 'SELECT h1_art,id_art,titre_art  FROM Article' ;
        $query = $dbh->prepare($sql);
        $query->execute();
        $objet = $query->fetchAll(PDO::FETCH_CLASS,'article');
        return $objet;
    }

      static function readOne($dbh, $id) {
        $sql= 'SELECT * FROM Article WHERE id_art = :valeur';
        $query = $dbh->prepare($sql);
        $query->bindValue(':valeur', $id, PDO::PARAM_STR);
        $query->execute();
        $objet = $query->fetchObject('article');
        return $objet;
    }
    static function Next($dbh, $id) {
        $sql= 'SELECT h1_art, min(id_art) AS suivant  FROM Article WHERE id_art > :valeur';
        $query = $dbh->prepare($sql);
        $query->bindValue(':valeur', $id, PDO::PARAM_STR);
        $query->execute();
        $objet = $query->fetchObject('article');
        return $objet;
    }
    static function Prev($dbh, $id) {
        $sql= 'SELECT h1_art, max(id_art) AS precedent  FROM Article WHERE id_art < :valeur';
        $query = $dbh->prepare($sql);
        $query->bindValue(':valeur', $id, PDO::PARAM_STR);
        $query->execute();
        $objet = $query->fetchObject('article');
        return $objet;
    }

    static function deleteart($dbh, $id_art) {
        $sql = 'DELETE FROM Article WHERE id_art = :id;';
        $query = $dbh->prepare($sql);
        $query->bindValue(':id', $id_art, PDO::PARAM_INT);
        $query->execute();
    }
}