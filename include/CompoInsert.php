<?php
// Inserer une composition
function compo_insert($dbh){
    if (isset($_POST['comp'])){
        $st = $_POST['st_comp'];
        $text = $_POST['texte_comp'];
        $autcomp = $_POST['auteur_comp'];
        $citation = $_POST['citation_comp'];
        $art = $_POST['id_art'];
        if (!empty($_POST['media_comp'])) {
        
            $media = $_FILES['media_comp']['name'];
            $mediaChemin = pathinfo($media);
            $mediaFichier = $mediaChemin['extension'];
            
            $extensionsAutorisees = array("mp4", "png", "jpg");
            $video = array("mp4");
            $img = array("png", "jpg");
            
            if (!(in_array($mediaFichier, $extensionsAutorisees))) {
                echo "Le fichier n'a pas l'extension attendue";
            } else {
                if (in_array($mediaFichier, $video)) {
                    $repertoireDestination = '/iut/users/lejeune/public_html/ptweb/media/video/';
                }
                if (in_array($mediaFichier, $img)) {
                    $repertoireDestination = '/iut/users/lejeune/public_html/ptweb/media/img/';
                }
                $nomDestination = $media;
                $comp = $media;
                if (move_uploaded_file($_FILES["media_comp"]["tmp_name"],
                $repertoireDestination.$nomDestination)) {
                }}}
            $comp = NULL;        
            $insert = new compo();
        
            $insert->modifiercomp($st, $text, $autcomp, $comp, $citation, $art);
        
            $insert->createcomp($dbh);
        }
        
}
function update_comp($dbh){
   

        $st = $_POST['st_comp'];
        $text = $_POST['texte_comp'];
        $autcomp = $_POST['auteur_comp'];
        $citation = $_POST['citation_comp'];
        $art = $_POST['id_art'];
        $id_comp = $_POST['id_comp_update'];
        if (!empty($_POST['media_comp'])) {
        
            $media = $_FILES['media_comp']['name'];
            $mediaChemin = pathinfo($media);
            $mediaFichier = $mediaChemin['extension'];
            
            $extensionsAutorisees = array("mp4", "png", "jpg");
            $video = array("mp4");
            $img = array("png", "jpg");
            
            if (!(in_array($mediaFichier, $extensionsAutorisees))) {
                echo "Le fichier n'a pas l'extension attendue";
            } else {
                if (in_array($mediaFichier, $video)) {
                    $repertoireDestination = '/iut/users/lejeune/public_html/ptweb/media/video/';
                }
                if (in_array($mediaFichier, $img)) {
                    $repertoireDestination = '/iut/users/lejeune/public_html/ptweb/media/img/';
                }
                $nomDestination = $media;
                $comp = $media;
                if (move_uploaded_file($_FILES["media_comp"]["tmp_name"],
                $repertoireDestination.$nomDestination)) {
                }}}
            $comp = NULL;        
            $insert = new compo();
        
            $insert->modifierpourupdate($st, $text, $autcomp, $comp, $citation, $art, $id_comp);
        
            $insert->updatecomp($dbh);
        }

// Supprimer une composition
function compo_delete($dbh){
    if (
        isset($_POST['id_comp_delete']) 
        ){  
        $id_comp = $_POST['id_comp_delete'];
        compo::deletecomp($dbh, $id_comp);  
    }
}