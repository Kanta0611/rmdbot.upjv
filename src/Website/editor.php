<?php session_start(); 
include "vars.php";
// verification si l'utilisateur est valide
$db = new PDO("mysql:host={$db_uri};dbname={$db_name}", $db_user, $db_password); // initialisation de la bdd dans le fichier PHP

// on obtient tout les ID discord
$getEveryDiscordIDRequest = "SELECT discord_id FROM admins WHERE 1";

$getEveryDiscordIDPrepare = $db->prepare($getEveryDiscordIDRequest);
$getEveryDiscordIDPrepare->execute();

// on crée un tableau avec tout les ID
$rows = array();
$index = 0;

// on remplit le tableau
while ($row = $getEveryDiscordIDPrepare->fetch()) {
    $rows[$index] = $row;
    $index++;
}

$saltedDiscordID = $_SESSION['discordid'];
$connected = false;

for ($i = 0; $i < count($rows); $i++) {
    if (hash("sha256", $rows[$i][0]) == $saltedDiscordID) {
        $connected = true;
    }
}

if (!$connected) {
    unset($_SESSION['discordid']);
    header("Location: index.php");
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
                <li><a href="disconnect.php">Deconnexion</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <p id="warn"><b>Attention !</b> Dans la version actuelle du site, toute modification que vous faites modifie le fichier et aucun moyen de revenir en arrière ! Faites attention </p>
        <?php echo "Connecté en tant que : " . $_SESSION['discordid'] . "<br /> <br /> <br /> <br />"; ?>
        <div class="addform">
            <h1>Ajouter un cours</h1>
            <span>Jour du cours</span> <select name="day" id="addDaySelector">
                <option value="monday">Lundi</option>
                <option value="tuesday">Mardi</option>
                <option value="wednesday">Mercredi</option>
                <option value="thursday">Jeudi</option>
                <option value="friday">Vendredi</option>
                <option value="saturday">Samedi</option>
            </select> <br>
            <span>Heure du cours</span> <input type="time" id="addTime"> <br>
            <span>Durée du cours (en demi-heures)</span> <input type="number" name="halfs" id="addCourseLength"> <br>
            <span>Nom du cours</span> <input type="text" name="name" id="addCourseName"> <br>
            <span>Salle</span> <input type="text" name="room" id="addCourseRoom"> <br>
            <span>Prof</span> <input type="text" name="teacher" id="addCourseTeacher"> <br>
            <button id="addcourse">Ajouter le cours</button>
        </div>
        <div class="editform">
        <h1>Modifier un cours</h1>
            <span>Cours</span> <select name="day" id="editCourseSelector">
                <option disabled selected>--Sélectionner un cours--</option>
            </select> <br>
            <span>date du cours</span> <input type="time" name="date" id="editTime"> <br>
            <span>Durée du cours (en demi-heures)</span> <input type="number" name="halfs" id="editCourseLength"> <br>
            <span>Nom du cours</span> <input type="text" name="name" id="editCourseName"> <br>
            <span>Salle</span> <input type="text" name="room" id="editCourseRoom"> <br>
            <span>Prof</span> <input type="text" name="teacher" id="editCourseTeacher"> <br>
            <button id="editcourse">Modifier le cours</button>
            <button id="deletecourse">Supprimer le cours</button>  
        </div>
        <div class="courses">
            <h1>Liste des cours actuels</h1>
        </div>

        <script>let trapToSkids = "<?php echo $_SESSION['unsalted_discordid'] ?>";</script>
        <script src="js/a.js"></script>
        <script src="js/editorParser.js"></script>
        <script src="js/editor.js"></script>
    </main>
</body>
</html>