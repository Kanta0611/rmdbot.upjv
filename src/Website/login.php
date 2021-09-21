<?php session_start(); 

// redirection si l'utilisateur est déjà connecté
if (isset($_SESSION['discordid']) && $_SESSION['discordid'] != "")
{
    header("Location: editor.php");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    
<header>
        <nav>
            <ul>
                <li><a href="index.php">Voir EDT</a></li>
                <li><a href="schedule.json">API</a></li>
                <li><a href="login.php">Mettre à jour l'EDT</a></li>
            </ul>
        </nav>
    </header>
    <main>
    <form method="POST">
        <input type="text" placeholder="Nom d'utilisateur" name="username">
        <input type="password" placeholder="Mot de passe" name="password">
        <input type="submit" value="Se connecter">
    </form>

    <?php
        include "vars.php"; // inclusion des variables de bdd
        if ((isset($_POST['username']) && $_POST['username'] != '') && (isset($_POST['password']) && $_POST['password'] != '')) {
            $db = new PDO("mysql:host={$db_uri};dbname={$db_name}", $db_user, $db_password); // initialisation de la bdd dans le fichier PHP

            $hashedPassword = hash("sha512", $_POST['password']); // hash du mot de passe en SHA512

            $sqlCmd = "SELECT * FROM admins WHERE username='{$_POST['username']}' AND password='{$hashedPassword}'"; // commande sélectionnant l'enregistrement avec les identifiants entrés
            
            $prepare = $db->prepare($sqlCmd); // préparation et execution de la requête
            $prepare->execute();

            $row = $prepare->fetch();
            if ($prepare->rowCount() > 0) {
                $_SESSION['discordid'] = hash('sha256', $row['discord_id']);
                $_SESSION['unsalted_discordid'] = $row['discord_id'];

                header('Location: editor.php');
                die();
            } else {
                echo "<script> alert('Incorrect username / password'); </script>";
            }
        } else {
            echo "<script> alert('Please fill every fields'); </script>";
        }
    ?>
    </main>
</body>
</html>