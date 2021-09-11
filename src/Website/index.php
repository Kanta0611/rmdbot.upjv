<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SimpleScheduleViewer</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Voir EDT</a></li>
                <li><a href="schedule.json">API</a></li>
                <li><a href="updater.php">Mettre à jour l'EDT</a></li>
            </ul>
        </nav>
        <!-- header, titre, nav {viewer, api, creator (avec connexion)} -->
    </header>
    <main>
        <!-- edt visible simplement et de façon responsive -->
        <style>
            td {
                border: 1px solid black;
            }
        </style>
        <table>
            <tr>
                <td>X</td>
                <td>Lundi</td>
                <td>Mardi</td>
                <td>Mercredi</td>
                <td>Jeudi</td>
                <td>Vendredi</td>
                <td>Samedi</td>
            </tr>
            <tr>
                <td>8h</td>
                <td id="mon-8">xxxx</td>
                <td id="tue-8">xxxx</td>
                <td id="wed-8">xxxx</td>
                <td id="thu-8">xxxx</td>
                <td id="fri-8">xxxx</td>
                <td id="sat-8">xxxx</td>
            </tr>
            <tr>
                <td>8h30</td>
                <td id="mon-830">xxxx</td>
                <td id="tue-830">xxxx</td>
                <td id="wed-830">xxxx</td>
                <td id="thu-830">xxxx</td>
                <td id="fri-830">xxxx</td>
                <td id="sat-830">xxxx</td>
            </tr>
            <tr>
                <td>9h</td>
                <td id="mon-9">xxxx</td>
                <td id="tue-9">xxxx</td>
                <td id="wed-9">xxxx</td>
                <td id="thu-9">xxxx</td>
                <td id="fri-9">xxxx</td>
                <td id="sat-9">xxxx</td>
            </tr>
            <tr>
                <td>9h30</td>
                <td id="mon-930">xxxx</td>
                <td id="tue-930">xxxx</td>
                <td id="wed-930">xxxx</td>
                <td id="thu-930">xxxx</td>
                <td id="fri-930">xxxx</td>
                <td id="sat-930">xxxx</td>
            </tr>
            <tr>
                <td>10h</td>
                <td id="mon-10">xxxx</td>
                <td id="tue-10">xxxx</td>
                <td id="wed-10">xxxx</td>
                <td id="thu-10">xxxx</td>
                <td id="fri-10">xxxx</td>
                <td id="sat-10">xxxx</td>
            </tr>
            <tr>
                <td>10h30</td>
                <td id="mon-1030">xxxx</td>
                <td id="tue-1030">xxxx</td>
                <td id="wed-1030">xxxx</td>
                <td id="thu-1030">xxxx</td>
                <td id="fri-1030">xxxx</td>
                <td id="sat-1030">xxxx</td>
            </tr>
            <tr>
                <td>11h</td>
                <td id="mon-11">xxxx</td>
                <td id="tue-11">xxxx</td>
                <td id="wed-11">xxxx</td>
                <td id="thu-11">xxxx</td>
                <td id="fri-11">xxxx</td>
                <td id="sat-11">xxxx</td>
            </tr>
            <tr>
                <td>11h30</td>
                <td id="mon-1130">xxxx</td>
                <td id="tue-1130">xxxx</td>
                <td id="wed-1130">xxxx</td>
                <td id="thu-1130">xxxx</td>
                <td id="fri-1130">xxxx</td>
                <td id="sat-1130">xxxx</td>
            </tr>
            <tr>
                <td>12h</td>
                <td id="mon-12">xxxx</td>
                <td id="tue-12">xxxx</td>
                <td id="wed-12">xxxx</td>
                <td id="thu-12">xxxx</td>
                <td id="fri-12">xxxx</td>
                <td id="sat-12">xxxx</td>
            </tr>
            <tr>
                <td>12h30</td>
                <td id="mon-1230">xxxx</td>
                <td id="tue-1230">xxxx</td>
                <td id="wed-1230">xxxx</td>
                <td id="thu-1230">xxxx</td>
                <td id="fri-1230">xxxx</td>
                <td id="sat-1230">xxxx</td>
            </tr>
            <tr>
                <td>13h</td>
                <td id="mon-13">xxxx</td>
                <td id="tue-13">xxxx</td>
                <td id="wed-13">xxxx</td>
                <td id="thu-13">xxxx</td>
                <td id="fri-13">xxxx</td>
                <td id="sat-13">xxxx</td>
            </tr>
            <tr>
                <td>13h30</td>
                <td id="mon-1330">xxxx</td>
                <td id="tue-1330">xxxx</td>
                <td id="wed-1330">xxxx</td>
                <td id="thu-1330">xxxx</td>
                <td id="fri-1330">xxxx</td>
                <td id="sat-1330">xxxx</td>
            </tr>
            <tr>
                <td>14h</td>
                <td id="mon-14">xxxx</td>
                <td id="tue-14">xxxx</td>
                <td id="wed-14">xxxx</td>
                <td id="thu-14">xxxx</td>
                <td id="fri-14">xxxx</td>
                <td id="sat-14">xxxx</td>
            </tr>
            <tr>
                <td>14h30</td>
                <td id="mon-1430">xxxx</td>
                <td id="tue-1430">xxxx</td>
                <td id="wed-1430">xxxx</td>
                <td id="thu-1430">xxxx</td>
                <td id="fri-1430">xxxx</td>
                <td id="sat-1430">xxxx</td>
            </tr>
            <tr>
                <td>15h</td>
                <td id="mon-15">xxxx</td>
                <td id="tue-15">xxxx</td>
                <td id="wed-15">xxxx</td>
                <td id="thu-15">xxxx</td>
                <td id="fri-15">xxxx</td>
                <td id="sat-15">xxxx</td>
            </tr>
            <tr>
                <td>15h30</td>
                <td id="mon-1530">xxxx</td>
                <td id="tue-1530">xxxx</td>
                <td id="wed-1530">xxxx</td>
                <td id="thu-1530">xxxx</td>
                <td id="fri-1530">xxxx</td>
                <td id="sat-1530">xxxx</td>
            </tr>
            
            <tr>
                <td>16h</td>
                <td id="mon-16">xxxx</td>
                <td id="tue-16">xxxx</td>
                <td id="wed-16">xxxx</td>
                <td id="thu-16">xxxx</td>
                <td id="fri-16">xxxx</td>
                <td id="sat-16">xxxx</td>
            </tr>
            <tr>
                <td>16h30</td>
                <td id="mon-1630">xxxx</td>
                <td id="tue-1630">xxxx</td>
                <td id="wed-1630">xxxx</td>
                <td id="thu-1630">xxxx</td>
                <td id="fri-1630">xxxx</td>
                <td id="sat-1630">xxxx</td>
            </tr>
            <tr>
                <td>17h</td>
                <td id="mon-17">xxxx</td>
                <td id="tue-17">xxxx</td>
                <td id="wed-17">xxxx</td>
                <td id="thu-17">xxxx</td>
                <td id="fri-17">xxxx</td>
                <td id="sat-17">xxxx</td>
            </tr>
            <tr>
                <td>17h30</td>
                <td id="mon-1730">xxxx</td>
                <td id="tue-1730">xxxx</td>
                <td id="wed-1730">xxxx</td>
                <td id="thu-1730">xxxx</td>
                <td id="fri-1730">xxxx</td>
                <td id="sat-1730">xxxx</td>
            </tr>
            <tr>
                <td>18h</td>
                <td id="mon-18">xxxx</td>
                <td id="tue-18">xxxx</td>
                <td id="wed-18">xxxx</td>
                <td id="thu-18">xxxx</td>
                <td id="fri-18">xxxx</td>
                <td id="sat-18">xxxx</td>
            </tr>
            <tr>
                <td>18h30</td>
                <td id="mon-1830">xxxx</td>
                <td id="tue-1830">xxxx</td>
                <td id="wed-1830">xxxx</td>
                <td id="thu-1830">xxxx</td>
                <td id="fri-1830">xxxx</td>
                <td id="sat-1830">xxxx</td>
            </tr>
            <tr>
                <td>19h</td>
                <td id="mon-19">xxxx</td>
                <td id="tue-19">xxxx</td>
                <td id="wed-19">xxxx</td>
                <td id="thu-19">xxxx</td>
                <td id="fri-19">xxxx</td>
                <td id="sat-19">xxxx</td>
            </tr>
            <tr>
                <td>19h30</td>
                <td id="mon-1930">xxxx</td>
                <td id="tue-1930">xxxx</td>
                <td id="wed-1930">xxxx</td>
                <td id="thu-1930">xxxx</td>
                <td id="fri-1930">xxxx</td>
                <td id="sat-1930">xxxx</td>
            </tr>
            <tr>
                <td>20h</td>
                <td id="mon-20">xxxx</td>
                <td id="tue-20">xxxx</td>
                <td id="wed-20">xxxx</td>
                <td id="thu-20">xxxx</td>
                <td id="fri-20">xxxx</td>
                <td id="sat-20">xxxx</td>
            </tr>
            <tr>
                <td>20h30</td>
                <td id="mon-2030">xxxx</td>
                <td id="tue-2030">xxxx</td>
                <td id="wed-2030">xxxx</td>
                <td id="thu-2030">xxxx</td>
                <td id="fri-2030">xxxx</td>
                <td id="sat-2030">xxxx</td>
            </tr>
            <tr>
                <td>21h</td>
                <td id="mon-21">xxxx</td>
                <td id="tue-21">xxxx</td>
                <td id="wed-21">xxxx</td>
                <td id="thu-21">xxxx</td>
                <td id="fri-21">xxxx</td>
                <td id="sat-21">xxxx</td>
            </tr>
        </table>
        <script src="js/parser.js"></script>
    </main>
</body>
</html>