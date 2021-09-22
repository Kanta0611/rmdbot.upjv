<?php
/**
 * @param string $courseDay Jour du cours (lundi, mardi, mercredi, jeudi, vendredi, samedi)
 * @param string $courseName Nom du cours
 * @param string $courseRoom Salle du cours
 * @param string $courseStart Heure (format ISO) du cours
 * @param int $courseLength Durée du cours (en n-demi-heures)
 * @param string $courseTeacher Prof du cours
 * 
 * @return void
 */
function addObject($courseDay, $courseName, $courseRoom, $courseStart, $courseLength, $courseTeacher) {
    $filecontent = file_get_contents("schedule.json"); // charge le contenu du fichier
    $data = json_decode($filecontent, true);
	$guid = uniqid();

    $addedobj = [
        "uuid" => $guid,
        "name" => $courseName,
        "room" => $courseRoom,
        "hour" => [
            "start" => $courseStart,
            "length" => $courseLength
        ],
        "teacher" => $courseTeacher
    ];

    $id = sizeof($data[$courseDay]);
    $data[$courseDay][$id] = $addedobj;

    file_put_contents("schedule.json", json_encode($data));
}

/**
 * @param string $guid ID du cours
 * 
 * @return void
 */
function removeObject($guid) {
    
    $filecontent = file_get_contents("schedule.json"); // charge le contenu du fichier
    $data = json_decode($filecontent, true);

    for($i = 0; $i < sizeof($data['monday']); $i++) {
        if ($guid == $data['monday'][$i]['uuid']) {
           unset($data['monday'][$i]);
        }
    }

    for($i = 0; $i < sizeof($data['tuesday']); $i++) {
        if ($guid == $data['tuesday'][$i]['uuid']) {
           unset($data['tuesday'][$i]);
        }
    }

    for($i = 0; $i < sizeof($data['wednesday']); $i++) {
        if ($guid == $data['wednesday'][$i]['uuid']) {
           unset($data['wednesday'][$i]);
        }
    }

    for($i = 0; $i < sizeof($data['thursday']); $i++) {
        if ($guid == $data['thursday'][$i]['uuid']) {
           unset($data['thursday'][$i]);
        }
    }

    for($i = 0; $i < sizeof($data['friday']); $i++) {
        if ($guid == $data['friday'][$i]['uuid']) {
           unset($data['friday'][$i]);
        }
    }

    for($i = 0; $i < sizeof($data['saturday']); $i++) {
        if ($guid == $data['saturday'][$i]['uuid']) {
           unset($data['saturday'][$i]);
        }
    }

    file_put_contents("schedule.json", json_encode($data));
}

/**
 * @param string $guid ID du cours
 * @param string $courseName Nom du cours
 * @param string $courseRoom Salle du cours
 * @param string $courseStart Heure (format ISO) du cours
 * @param string $courseLength Durée du cours (en n-demi-heure)
 * @param string $courseTeacher Prof du cours
 * 
 * @return void
 */
function editObject($guid, $courseName, $courseRoom, $courseStart, $courseLength, $courseTeacher) {
    
    $filecontent = file_get_contents("schedule.json"); // charge le contenu du fichier
    $data = json_decode($filecontent, true);

    $editeddobj = [
        "uuid" => $guid,
        "name" => $courseName,
        "room" => $courseRoom,
        "hour" => [
            "start" => $courseStart,
            "length" => $courseLength
        ],
        "teacher" => $courseTeacher
    ];

    for($i = 0; $i < sizeof($data['monday']); $i++) {
        if ($guid == $data['monday'][$i]['uuid']) {
            $data['monday'][$i] = $editeddobj;
        }
    }

    for($i = 0; $i < sizeof($data['tuesday']); $i++) {
        if ($guid == $data['tuesday'][$i]['uuid']) {
            $data['tuesday'][$i] = $editeddobj;
        }
    }

    for($i = 0; $i < sizeof($data['wednesday']); $i++) {
        if ($guid == $data['wednesday'][$i]['uuid']) {
            $data['wednesday'][$i] = $editeddobj;
        }
    }

    for($i = 0; $i < sizeof($data['thursday']); $i++) {
        if ($guid == $data['thursday'][$i]['uuid']) {
            $data['thursday'][$i] = $editeddobj;
        }
    }

    for($i = 0; $i < sizeof($data['friday']); $i++) {
        if ($guid == $data['friday'][$i]['uuid']) {
            $data['friday'][$i] = $editeddobj;
        }
    }

    for($i = 0; $i < sizeof($data['saturday']); $i++) {
        if ($guid == $data['saturday'][$i]['uuid']) {
            $data['saturday'][$i] = $editeddobj;
        }
    }

    file_put_contents("schedule.json", json_encode($data));
}
?>

<?php

function isUser() {
    if (isset($_POST['discordid']) && $_POST['discordid'] != "") {
        include "vars.php";

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

        $saltedDiscordID = $_POST['discordid'];
        $connected = false;

        for ($i = 0; $i < count($rows); $i++) {
            if (hash("sha256", $rows[$i][0]) == $saltedDiscordID) {
                $connected = true;
            }
        }

        return $connected;
    }
}

if (!isset($_GET["api"])) {$data = [
    "message" => "No API Endpoint provided or endpoint is not valid"
];

header("Content-type: application/json");
echo(json_encode($data));

	return;
}

	// differents apis
	// getVersion donne la version de l'API actuelle
    // addCourse ajoute un cours
    // removeCourse supprime un cours
    // clearWeek supprime tout les cours
    // editCourse édite un cours
switch ($_GET["api"]) {
	case "getVersion":
		echo "1.0";
		break;
    
    case "addCourse":
        // vérification de l'utilisateur, si l'id n'existe pas on annule l'opération
        if (!isUser()) {
            $state =  [
                "state" => "Not connected"
            ];
            // header("Content-type: application/json");
            echo(json_encode($state));
            die();
        }

        if (isset($_GET['day']) && $_GET['day'] != "" && isset($_GET['name']) && $_GET['name'] != ""  && isset($_GET['room']) && $_GET['room'] != "" && isset($_GET['start']) && $_GET['start'] != "" && isset($_GET['length']) && $_GET['length'] != 0 && isset($_GET['teacher']) && $_GET['teacher'] != "") {
            addObject($_GET['day'], $_GET['name'], $_GET['room'], $_GET['start'], $_GET['length'], $_GET['teacher']);
            $state =  [
                "state" => "OK"
            ];
            header("Content-type: application/json");
            echo(json_encode($state));
        } else {
            $state =  [
                "state" => "There are missing arguments"
            ];
            header("Content-type: application/json");
            echo(json_encode($state));      
        }
        break;

    case "removeCourse":
        if (!isUser()) {
            $state =  [
                "state" => "Not connected"
            ];
            header("Content-type: application/json");
            echo(json_encode($state));
            die();
        }

        if (isset($_GET['guid']) && $_GET['guid'] != "") {
            removeObject($_GET['guid']);

            $state =  [
                "state" => "OK"
            ];
            header("Content-type: application/json");
            echo(json_encode($state));
        
        } else {
            $state =  [
                "state" => "Missing GUID"
            ];
            header("Content-type: application/json");
            echo(json_encode($state));
        }
        break;
    
    case "clearWeek":
        $filecontent = file_get_contents("schedule.json"); // charge le contenu du fichier
        $data = [
            "monday" => [],
            "tuesday" => [],
            "wednesday" => [],
            "thursday" => [],
            "friday" => [],
            "saturday" => []
        ];

        file_put_contents("schedule.json", json_encode($data));
        break;

    case "editCourse":
        if (!isUser()) {
            $state =  [
                "state" => "Not connected"
            ];
            header("Content-type: application/json");
            echo(json_encode($state));
            die();
        }

        if (isset($_GET['guid']) && $_GET['guid'] && isset($_GET['name']) && $_GET['name'] != ""  && isset($_GET['room']) && $_GET['room'] != "" && isset($_GET['start']) && $_GET['start'] != "" && isset($_GET['length']) && $_GET['length'] != 0 && isset($_GET['teacher']) && $_GET['teacher'] != "") {
            $state = [];
            editObject($_GET['guid'], $_GET['name'], $_GET['room'], $_GET['start'], $_GET['length'], $_GET['teacher']);
            $state =  [
                "state" => "OK"
            ];

            header("Content-type: application/json");
            echo(json_encode($state));
        } else {
            $state =  [
                "state" => "There are missing arguments"
            ];
            // header("Content-type: application/json");
            echo(json_encode($state));      
        }
        break;

    case "checkRoutine":
        $data = [];
        if (isUser()) {
            $data = [
                "status" => "Connected"
            ];
        } else {
            $data = [
                "status" => "Not connected"
            ];
        }
        header("Content-type: application/json");
        echo json_encode($data);
        break;
    
    default:
        $data = [
            "message" => "No API Endpoint provided or endpoint is not valid"
        ];

        header("Content-type: application/json");
        echo(json_encode($data));
}

?>