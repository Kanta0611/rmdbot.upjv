<?php session_start(); 
include "vars.php";
// verification si l'utilisateur est valide
$db = new PDO("mysql:host={$db_uri};dbname={$db_name}", $db_user, $db_password); // initialisation de la bdd dans le fichier PHP


$sqlCmd = "SELECT * FROM admins WHERE discord_id='{$_SESSION['discordid']}'"; // commande sélectionnant l'enregistrement avec les identifiants entrés

$prepare = $db->prepare($sqlCmd); // préparation et execution de la requête

$prepare->execute();
$row = $prepare->fetch();

// si l'id discord n'est pas trouvé on reviens vers l'index
if ($prepare->rowCount() < 0) {
    unset($_SESSION['discordid']);

    header('Location: index.php');
    die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editeur d'emploi du temps</title>
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
        <p id="warn"><b>Attention !</b> Dans la version actuelle du site, toute modification que vous faites modifie le fichier et aucun moyen de revenir en arrière ! Faites attention </p>
        <?php echo "Connecté en tant que : " . $_SESSION['discordid'] . "<br /> <br /> <br /> <br />"; ?>
        <div class="addform">
            <h1>Ajouter un cours</h1>
            <span>Jour du cours</span> <select name="day" id="">
                <option value="monday">Lundi</option>
                <option value="tuesday">Mardi</option>
                <option value="wednesday">Mercredi</option>
                <option value="thursday">Jeudi</option>
                <option value="friday">Vendredi</option>
                <option value="saturday">Samedi</option>
            </select> <br>
            <span>date du cours</span> <input type="time" name="date" id="date"> <br>
            <span>Durée du cours (en demi-heures)</span> <input type="number" name="halfs" id=""> <br>
            <span>Nom du cours</span> <input type="text" name="name" id=""> <br>
            <span>Salle</span> <input type="text" name="room" id=""> <br>
            <span>Prof</span> <input type="text" name="teacher" id=""> <br>
            <input type="submit" value="Ajouter le cours">
        </div>
        <div class="editform">
        <h1>Modifier un cours</h1>
            <span>Cours</span> <select name="day" id="">
            </select> <br>
            <span>date du cours</span> <input type="time" name="date" id="date"> <br>
            <span>Durée du cours (en demi-heures)</span> <input type="number" name="halfs" id=""> <br>
            <span>Nom du cours</span> <input type="text" name="name" id=""> <br>
            <span>Salle</span> <input type="text" name="room" id=""> <br>
            <span>Prof</span> <input type="text" name="teacher" id=""> <br>
            <button id="deletecourse">Modifier le cours</button>
            <button id="deletecourse">Supprimer le cours</button>  
        </div>
        <div class="courses">
            <h1>Liste des cours actuels</h1>
        </div>
        <script src="js/editorParser.js"></script>
    </main>
</body>
</html>