<?php
function reg($dbh){
if (isset($_POST['reg']) && isset($_POST['pseudo']) && isset($_POST['mdp']) && isset($_POST['cmdp']) && isset($_POST['mail'])) {
    $username = $_POST['pseudo'];
    $password = $_POST['mdp'];
    $cmdp = $_POST['cmdp'];
    $usermail = $_POST['mail'];
    if ($password == $cmdp) {
        if (strlen($_POST['mdp']) >= 8) {
            $caq = new users();
    
            $caq->modifierforeg($username, $password, $usermail);
        
            $feedback = $caq->register($dbh);
           
            
        }
        else{
            $feedback = "Le mot de passe est trop court : il doit être composer d'au moins 8 caractères.";
          }
    }
    else{
        $feedback = "Les mots de passe sont différents";
    }
  }
 
  return $feedback;
 
}
function logi($dbh){
  if (isset($_POST['log']) && isset($_POST['lpseudo']) && isset($_POST['lmdp'])) {
      $lusername = $_POST['lpseudo'];
      $lpassword = $_POST['lmdp'];
  
          $feedback = users::login($dbh, $lusername, $lpassword);
        return $feedback;
    }
}
function deco(){
    session_destroy();
}
function deleteuser($dbh){
    if (isset($_POST['supprimer_user'])) {
         $users = $_POST['supprimer_user'];      
        users::deleteunmec($dbh, $users);  
    }
}
function changerole($dbh){
    if (isset($_POST['lecteur_user'])) {
         $id = $_POST['lecteur_user'];
         $roles = 1;      
        }
    elseif (isset($_POST['editeur_user'])) {
        $id = $_POST['editeur_user']; 
        $roles = 2;    
    } 
    elseif (isset($_POST['admin_user'])) {
        $id = $_POST['admin_user']; 
        $roles = 3;    
    }
           
    $caq = new users();
    
    $caq->modifierfoup($id, $roles);

    $caq->updateuser($dbh); 
     
}