<?php
// Inclut notre fonction et crée un nouveau moteur dans la variable $twig

include('include/include.php');
$twig = init_twig();
$dbh = getPDO();

session_start();

if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
}

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_POST['deco'])) {
    deco();
}


insert_art($dbh);

compo_delete($dbh);
article_delete($dbh);
$return = reg($dbh);
$feedback = logi($dbh);
// $compo = compo::selectcomp($dbh, $id);
// $menu = article::readTitre($dbh);
// test
//$yes = NULL;
//if (isset($_POST['coole'])) {
//    $yes = $_POST['coole'];
//}

// $read = article::readall($dbh);
// $list = article::readType($dbh, $categorie);
// $One = article::readOne($dbh, $id);
// $Tcomp = compo::Allcomp($dbh);
// Création de variables pour tester
//$accueil = $twig->render('index.html', [

//    ]);
// if (($page = $_GET['page'] ?? false) === false) {
/*     echo $accueil;
} else {
  if ($page == 'admin' && $role == 1) {
    echo $twig->render('affi/'.$page.'.html', [
        'role' => $role
    ]);
  }
  elseif ($page == 'admin'){
   header('Location: index.php');
  }
  else{
    echo $twig->render('affi/'.$page.'.html', [
            'list' => $list,
            'compo' => $compo,
            'cat' => $categorie,
            'One' => $One,
            'read' => $read,
            'menu' => $menu,
            'tcomp' => $Tcomp,
            'compte' => $compte,
            'total' => $total,
            'yes'=> $yes,
            'feedback' => $feedback,
            'role' => $role,
        ]);
}}
*/
if (isset($_GET['page']))
{ $page = $_GET['page'];
} else {$page = '';}

switch ($page) {
    case 'namearticle' :
        $modele = $page;
        if (isset($_GET['cat'])) {
            $categorie = $_GET['cat'];
        }
        $data = ['list' => article::readType($dbh, $categorie), 'cat' => $categorie, 'user' => $user, 'role' => $role];
      break;
    case 'fullarticle' :
        $modele = $page;
        $data = ['One' => article::readOne($dbh, $id), 'compo' => compo::selectcomp($dbh, $id), 'user' => $user, 'role' => $role];
    break;

    
    case 'justifier' :
        $modele = $page;
        if (isset($_GET['choice'])) {
            $categorie = $_GET['choice'];
        }
        $data = ['list' =>  json_encode(article::readType($dbh, $categorie))];
    break;
    case 'les-profils' :
        $modele = $page;
        if (isset($_GET['choice'])) {
            $categorie = $_GET['choice'];
        }
        $data = ['list' => json_encode(article::readType($dbh, $categorie))];
    break;
    case 'passe-sous-silence' :
        $modele = $page;
        if (isset($_GET['choice'])) {
            $categorie = $_GET['choice'];
        }
        $data = ['list' => json_encode(article::readType($dbh, $categorie))];
    break;
    case 'rapport-de-force' :
        $modele = $page;
        if (isset($_GET['choice'])) {
            $categorie = $_GET['choice'];
        }
        $data = ['list' => json_encode(article::readType($dbh, $categorie))];
    break;
    case 'sous-surveillance' :
        $modele = $page;
        if (isset($_GET['choice'])) {
            $categorie = $_GET['choice'];
        }
        $data = ['list' => json_encode(article::readType($dbh, $categorie))];
    break;


    case 'login' :
      $modele = $page;
      $data = ['feedback' => $feedback, 'user' => $user, 'role' => $role ];
      break;

    case 'register' :
      $modele = $page;
      $data = ['feedback' => $return, 'user' => $user, 'role' => $role];
      break;  
    case 'admin' :
        if ($role > 1) {
            $modele = $page;
            $data = ['feedback' => $feedback, 'user' => $user, 'role' => $role];
        }
        else {
            header('Location: index.php');
        }
        break;
    case 'insertout' :
        if ($role >= 2) {
            $modele = $page;
            $data = ['read' => article::readall($dbh), 'user' => $user, 'titre' => article::readTitre($dbh)];
            compo_insert($dbh);
        
        }
        else {
            header('Location: index.php');
        }
        break;
     case 'del' :
         if ($role >= 2) {
             $modele = $page;
             $data = ['menu' => article::readTitre($dbh), 'tcomp' => compo::Allcomp($dbh), 'user' => $user];
         }
         else {
             header('Location: index.php');
         }
         break;
    case 'mod' :
       if ($role >= 2) {
           $modele = $page;
           if (isset($_POST['coole'])) {
              $categorie = $_POST['coole'];
           }
           if (isset($_POST['comp'])) {
              $id_comp = $_POST['comp'];
         }
           if (isset($_POST['titre']) && isset($_POST['chap']) && isset($_POST['auteur']) && isset($_POST['para']) && isset($_POST['id'])) {
            update_art($dbh);
            
         }
   
         if (isset($_POST['st_comp']) && isset($_POST['id_art']) && isset($_POST['id_comp_update'])) {
             update_comp($dbh);
        }
           $json = json_encode(article::readTitre($dbh)); 
           $data = ['list' => article::readType($dbh, $categorie), 'read' => article::readall($dbh), 'user' => $user, 'tcomp' => compo::Allcomp($dbh), 'comp' => compo::ReadOne($dbh, $id_comp), 'json' => $json];
       }
       else {
           header('Location: index.php');
       }
       break;    
    case 'user' :
        if ($role == 3) {
            $modele = $page;
            deleteuser($dbh);
            changerole($dbh);
            $data = ['utilisateur' => users::afficheuser($dbh), 'user' => $user, 'role' => $role];
        }
        else {
            header('Location: index.php');
        }
    break;
    case 'mention' :
    
             $modele = $page;
      
            $data = [];
    
  
    break;

    default :
      $modele = '../index';
      $data = ['user' => $user, 'role' => $role];
  }
$data = 'menu' => article::readTitre($dbh);
  // Affichage du modèle choisi avec les données récupérées
echo $twig->render('affi/'.$modele.'.html', $data);
