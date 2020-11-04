<?php
// Inserer un article
function insert_art($dbh)
{
    if(isset($_POST['valide'])){
        $h1 = $_POST['h1_art'];
        $chap = $_POST['chap_art'];
        $auteur = $_POST['auteur_art'];
        $para = $_POST['para_art'];
        $titre = $_POST['titre'];
        if (!empty($_POST['monfichier'])) {
            $nomOrigine = $_FILES['monfichier']['name'];
            $elementsChemin = pathinfo($nomOrigine);
            $extensionFichier = $elementsChemin['extension'];
            $extensionsAutorisees = array("mp4", "png", "jpg");
            $video = array("mp4");
            $img = array("png", "jpg");
    
        if (!(in_array($extensionFichier, $extensionsAutorisees))) {
            echo "Le fichier n'a pas l'extension attendue";
        } else {
            if (in_array($extensionFichier, $video)) {
            $repertoireDestination = '/iut/users/lejeune/public_html/ptweb/media/video/';
            }
            if (in_array($extensionFichier, $img)) {
                $repertoireDestination = '/iut/users/lejeune/public_html/ptweb/media/img/';
                }
            $nomDestination = $nomOrigine;
            $dossier = $nomDestination;
            if (move_uploaded_file($_FILES["monfichier"]["tmp_name"],
                                           $repertoireDestination.$nomDestination)) {}}}
        $dossier = NULL;
        $caq = new article();
        $caq->modifier($h1, $chap, $dossier, $para, $titre, $auteur);
        $caq->createart($dbh);
        $mail = users::lecteurmail($dbh);
        var_dump($mail);
        foreach ($mail as $mails) {      
            $mail = $mails->mail_user;        
            $msg = 
            $sujet = 'Nouvelle Article sur Violence sexuelle : Exploration d\'un territoire méconnu';
            $message = ' Bonjour cher lecteur !  '. "\r\n";
            $message .= 'Un article a été rajouté sur notre site, nous vous invitons à aller y jeter un oeil'. "\r\n";
			 $message .= ''. "\r\n";
			$message .= 'Cordialement, l\'équipe du site Violence sexuelle : Exploration d\'un territoire méconnu'. "\r\n";
            $message .= 'https://violence.caquelin.etu.mmi-unistra.fr/detail-'.$titre.'';
          
            $retour = mail($mail, $sujet, $message, 'From : Mathilde@violence.caquelin.etu.mmi-unistra.fr');
        }
    }
}

// Modifier un artcile
function update_art($dbh)
{
    if(isset($_POST['up'])){
        $h1 = $_POST['h1_art'];
        $chap = $_POST['chap_art'];
        $auteur = $_POST['auteur_art'];
        $para = $_POST['para_art'];
        $titre = $_POST['titre'];
        $id_art_up = $_POST['id_art_update'];
        if (!empty($_POST['monfichier'])) {
            $nomOrigine = $_FILES['monfichier']['name'];
            $elementsChemin = pathinfo($nomOrigine);
            $extensionFichier = $elementsChemin['extension'];
            $extensionsAutorisees = array("mp4", "png", "jpg");
            $video = array("mp4");
            $img = array("png", "jpg");
    
        if (!(in_array($extensionFichier, $extensionsAutorisees))) {
            echo "Le fichier n'a pas l'extension attendue";
        } else {
            if (in_array($extensionFichier, $video)) {
            $repertoireDestination = '/iut/users/lejeune/public_html/ptweb/media/video/';
            }
            if (in_array($extensionFichier, $img)) {
                $repertoireDestination = '/iut/users/lejeune/public_html/ptweb/media/img/';
                }
            $nomDestination = $nomOrigine;
            $dossier = $nomDestination;
            if (move_uploaded_file($_FILES["monfichier"]["tmp_name"],
                                           $repertoireDestination.$nomDestination)) {}}}
        $dossier = NULL;
        $caq = new article();
        $caq->updatearticle($h1, $chap, $dossier, $para, $titre, $auteur, $id_art_up);
        $caq->updateart($dbh);   
    }
}

// Supprimer un artcile
function article_delete($dbh){
    if (
        isset($_POST['id_art_delete']) 
        ){  
        $id_art = $_POST['id_art_delete'];
        article::deleteart($dbh, $id_art);  
    }
}