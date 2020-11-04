<?php
// Fonction pour s'enregistrer
class users {

    public $username;
    public $password;
    public $usermail;
    public $id;
    public $roles;


    function modifierforeg($p, $n, $y) {
        $this->username = $p;
        $this->password = $n;
        $this->usermail = $y;
    }
    function modifierfoup($p, $n) {
        $this->id = $p;
        $this->roles = $n;
  
    } 



function register($dbh)
{
    $role = 1;
    $hashpass = password_hash($this->password, PASSWORD_BCRYPT);
    $veri = $dbh->prepare("SELECT pseudo_user FROM User WHERE pseudo_user = :pseudo");
    $veri->execute(['pseudo' => $this->username]);
    $result = $veri->rowCount();
    $maili = $dbh->prepare("SELECT mail_user FROM User WHERE mail_user = :mail");
    $maili->execute(['mail' => $this->usermail]);
    $final = $maili->rowCount();
    if ($result == 0 && $final == 0) {
        $q = $dbh->prepare("INSERT INTO User(pseudo_user,mdp_user,mail_user, role_user) VALUES(:pseudo,:mdp,:mail, :roles) ");
        $q->bindValue(':pseudo',$this->username,PDO::PARAM_STR);
        $q->bindValue(':mdp',$hashpass,PDO::PARAM_STR);
        $q->bindValue(':mail',$this->usermail,PDO::PARAM_STR);
        $q->bindValue(':roles',$role,PDO::PARAM_STR);
        $q->execute();
        $feedback = "Votre compte a bien été créé";
    } 
    else {
        $feedback = "Ce pseudo existe déja";
    }

    return $feedback;
}

// Fonction pour se connecter 
static function login($dbh, $username, $password)
{
    $q = $dbh->prepare("SELECT * FROM User WHERE pseudo_user = :pseudo");
    $q->execute(['pseudo' => $username]);
    $result = $q->fetch();
    if ($result == true) {
        if (password_verify($password, $result['mdp_user'])) {
           $role = $result['role_user'];
            $_SESSION['user'] = $username;
            $_SESSION['role'] = $role;
             header('Location: index.php');
        } else {
            $feedback = "Le mot de passe est incorrect ";
        }
    } else {
        $feedback = "Le compte n'existe pas";
    }

    return $feedback;
}

// Envoyer le mail
function lecteurmail($dbh){
    $mail = $dbh->prepare("SELECT mail_user FROM User WHERE role_user = 1");
    $mail->execute();
    $envoie = $mail->fetchAll(PDO::FETCH_CLASS,'users');
    return $envoie;
  
}

// Afficher l'user
function afficheuser($dbh){
    $query = $dbh->prepare("SELECT * FROM User");
    $query->execute();
    $user = $query->fetchAll(PDO::FETCH_CLASS,'users');
    return $user;
}

// Supprimer un user
static function deleteunmec($dbh, $users){

        $sql = 'DELETE FROM User WHERE id_user = :id;';
        $query = $dbh->prepare($sql);
        $query->bindValue(':id', $users, PDO::PARAM_INT);
        $query->execute();

}

// Modifier un user
function updateuser($dbh) {
    
    $sql = 'UPDATE User SET role_user = :roles WHERE id_user = :id;';

    $query = $dbh->prepare($sql);
    $query->bindValue(':id', $this->roles, PDO::PARAM_INT);
    $query->bindValue(':id', $this->id, PDO::PARAM_INT);
    $query->execute();
}}