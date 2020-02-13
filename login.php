<?php
include"connBD.php";
echo $conn->error;

$error = null;

if(isset($_POST["login"]) && isset($_POST["password"]))
{
    //deux fonctions pour eliminer toute attaque de type injection sql
    $login = strip_tags($_POST["login"]);
    $mdp = strip_tags($_POST["password"]);

     $sql = 'SELECT login, password FROM utilisateurs WHERE login="'.$login.'"';
     $res = $conn->query($sql);

     if($res->num_rows >= 1)
     {   $resultat = $res->fetch_row();
         $password = $resultat[1];


         if($mdp === $password) {
             session_start();
             $_SESSION ["connecte"] = 1;
             header("Location: create.php");
         }
         else {
             echo "Votre mot de passe est incorrect";
         }
     }
     else{
         echo "Votre login est incorrect";
     }

}

?>

<link rel="stylesheet" href="css/CSS_form_login.css" media="screen" charset="utf-8">

<div id="container">
    <form action="" method="post">
        <div>
            <label>Identifiant</label>
            <input type="text" name="login" required>
        </div>
        <div>
            <label>Mot de passe</label>
            <input type="password" name="password" required>
        </div>
        <div><input type="submit" value="connexion"">

    </form>
</div>

<!--while($tab=$res->fetch_assoc())-->
<!--{-->
<!--    if(isset($_POST["login"]) && isset($_POST["password"]))-->
<!--    {-->
<!--        $login = $_POST["login"];-->
<!--        $mdp = $_POST["password"];-->
<!---->
<!--        if($login === $tab["login"] && $mdp === $tab["password"])-->
<!--        {-->
<!--            echo "Bonjour " . $tab["login"];-->
<!---->
<!--            session_start();-->
<!--            $_SESSION["login"] = $login;-->
<!--            $_SESSION["password"] = $mdp;-->
<!--        }-->
<!--        else-->
<!--        {echo "vos données sont invalides, veuillez recommencer";}-->
<!--    }-->
<!--    else-->
<!--    {echo "Veuillez vous connecter s'il-vous-plait";}-->
<!--}-->
<!---->
<!--?>-->
