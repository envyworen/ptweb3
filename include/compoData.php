<?php
// Afficher les éléments de la table Compo
class compo{
    public $st;
    public $text;
    public $autcomp;
    public $comp;
    public $citation;
    public $art;
    public $id;
    public $id_comp;
    
    static  function selectcomp($dbh, $id) {
        $sql = 'SELECT Article.id_art AS "article" , Compo.id_art AS "compo", st_comp, texte_comp, media_comp, citation_comp, auteur_comp, h1_art, chap_art, media_art, auteur_art, titre_art
        FROM Article
        LEFT OUTER JOIN Compo
        ON Article.id_art=Compo.id_art
        WHERE Article.id_art = :valeur';
        $query = $dbh -> prepare($sql);
        $query->bindValue (':valeur', $id, PDO::PARAM_INT);
        $query->execute();
        $comp = $query -> fetchall(PDO :: FETCH_CLASS, 'compo');
        return $comp;
    }
    static  function Allcomp($dbh) {
        $sql = 'SELECT *
        FROM Compo ;';
        $query = $dbh -> prepare($sql);
        $query->execute();
        $comp = $query -> fetchall(PDO :: FETCH_CLASS, 'compo');
        return $comp;
    }

// Inserer des éléments dans la table Compo

    function modifiercomp($s, $t, $a, $m, $c, $i ) {
        $this->st = $s;
        $this->text = $t;
        $this->autcomp = $a;
        $this->comp = $m;
        $this->citation = $c;
        $this->art = $i;
    }
    function modifierpourupdate($s, $t, $a, $m, $c, $i, $f ) {
        $this->st = $s;
        $this->text = $t;
        $this->autcomp = $a;
        $this->comp = $m;
        $this->citation = $c;
        $this->art = $i;
        $this->id_comp = $f;
    }

    // Créer une compo
    function createcomp($dbh) {

        $sql = 'INSERT INTO Compo (st_comp, texte_comp, media_comp, citation_comp, auteur_comp, id_art) VALUES (:st, :texte, :media_comp, :citation_comp, :auteur_comp, :id_art);';
        
        // préparation de la requête
        $query = $dbh->prepare($sql);
        // on donne une valeur aux paramètres à partir des attributs de l'objet courant
        $query->bindValue(':st', $this->st, PDO::PARAM_STR);
        $query->bindValue(':texte', $this->text, PDO::PARAM_STR);
        $query->bindValue(':media_comp', $this->comp, PDO::PARAM_STR);
        $query->bindValue(':auteur_comp', $this->autcomp, PDO::PARAM_STR);
        $query->bindValue(':citation_comp', $this->citation, PDO::PARAM_STR);
        $query->bindValue(':id_art', $this->art, PDO::PARAM_INT);
        $query->execute();    
    }

    // Modifier une compo
    function updatecomp($dbh) {
    
        $sql = 'UPDATE Compo SET st_comp = :st , texte_comp = :texte, media_comp = :media_comp, auteur_comp = :auteur_comp, citation_comp = :citation_comp, id_art = :id_art WHERE id_comp = :id;';
    
        $query = $dbh->prepare($sql);
        $query->bindValue(':st', $this->st, PDO::PARAM_STR);
        $query->bindValue(':texte', $this->text, PDO::PARAM_STR);
        $query->bindValue(':media_comp', $this->comp, PDO::PARAM_STR);
        $query->bindValue(':auteur_comp', $this->autcomp, PDO::PARAM_STR);
        $query->bindValue(':citation_comp', $this->citation, PDO::PARAM_STR);
        $query->bindValue(':id_art', $this->art, PDO::PARAM_INT);
        $query->bindValue(':id', $this->id_comp, PDO::PARAM_INT);
        $query->execute();
    }

    // Supprimer une compo
    static function deletecomp($dbh, $id_comp) {
        $sql = 'DELETE FROM Compo WHERE id_comp = :id;';
        $query = $dbh->prepare($sql);
        $query->bindValue(':id', $id_comp, PDO::PARAM_INT);
        $query->execute();
    }
}