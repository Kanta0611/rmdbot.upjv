<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SimpleScheduleViewer</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <header>
        <nav>
            <h2>Menu</h2>
            <ul>
                <li><a class="navbar-link" href="index.php">Voir EDT</a></li>
                <li><a class="navbar-link" href="schedule.json">API</a></li>
                <li><a class="navbar-link" href="login.php">Maj EDT</a></li>
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
                <!-- colonnes -->
                <th>X</th>
                <th>Lundi</th>
                <th>Mardi</th>
                <th>Mercredi</th>
                <th>Jeudi</th>
                <th>Vendredi</th>
                <th>Samedi</th>
            </tr>
            <tr>
                <!-- ligne 8h -->
                <td>8h</td>
                <td id="mon-8" class="mon-1">xxxx</td>
                <td id="tue-8" class="tue-1">xxxx</td>
                <td id="wed-8" class="wed-1">xxxx</td>
                <td id="thu-8" class="thu-1">xxxx</td>
                <td id="fri-8" class="fri-1">xxxx</td>
                <td id="sat-8" class="sat-1">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 8h30 -->
                <td>8h30</td>
                <td id="mon-830" class="mon-2">xxxx</td>
                <td id="tue-830" class="tue-2">xxxx</td>
                <td id="wed-830" class="wed-2">xxxx</td>
                <td id="thu-830" class="thu-2">xxxx</td>
                <td id="fri-830" class="fri-2">xxxx</td>
                <td id="sat-830" class="sat-2">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 9h -->
                <td>9h</td>
                <td id="mon-9" class="mon-3">xxxx</td>
                <td id="tue-9" class="tue-3">xxxx</td>
                <td id="wed-9" class="wed-3">xxxx</td>
                <td id="thu-9" class="thu-3">xxxx</td>
                <td id="fri-9" class="fri-3">xxxx</td>
                <td id="sat-9" class="sat-3">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 9h30 -->
                <td>9h30</td>
                <td id="mon-930" class="mon-4">xxxx</td>
                <td id="tue-930" class="tue-4">xxxx</td>
                <td id="wed-930" class="wed-4">xxxx</td>
                <td id="thu-930" class="thu-4">xxxx</td>
                <td id="fri-930" class="fri-4">xxxx</td>
                <td id="sat-930" class="sat-4">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 10h -->
                <td>10h</td>
                <td id="mon-10" class="mon-5">xxxx</td>
                <td id="tue-10" class="tue-5">xxxx</td>
                <td id="wed-10" class="wed-5">xxxx</td>
                <td id="thu-10" class="thu-5">xxxx</td>
                <td id="fri-10" class="fri-5">xxxx</td>
                <td id="sat-10" class="sat-5">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 10h30 -->
                <td>10h30</td>
                <td id="mon-1030" class="mon-6">xxxx</td>
                <td id="tue-1030" class="tue-6">xxxx</td>
                <td id="wed-1030" class="wed-6">xxxx</td>
                <td id="thu-1030" class="thu-6">xxxx</td>
                <td id="fri-1030" class="fri-6">xxxx</td>
                <td id="sat-1030" class="sat-6">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 11h -->
                <td>11h</td>
                <td id="mon-11" class="mon-7">xxxx</td>
                <td id="tue-11" class="tue-7">xxxx</td>
                <td id="wed-11" class="wed-7">xxxx</td>
                <td id="thu-11" class="thu-7">xxxx</td>
                <td id="fri-11" class="fri-7">xxxx</td>
                <td id="sat-11" class="sat-7">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 11h30 -->
                <td>11h30</td>
                <td id="mon-1130" class="mon-8">xxxx</td>
                <td id="tue-1130" class="tue-8">xxxx</td>
                <td id="wed-1130" class="wed-8">xxxx</td>
                <td id="thu-1130" class="thu-8">xxxx</td>
                <td id="fri-1130" class="fri-8">xxxx</td>
                <td id="sat-1130" class="sat-8">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 12h -->
                <td>12h</td>
                <td id="mon-12" class="mon-9">xxxx</td>
                <td id="tue-12" class="tue-9">xxxx</td>
                <td id="wed-12" class="wed-9">xxxx</td>
                <td id="thu-12" class="thu-9">xxxx</td>
                <td id="fri-12" class="fri-9">xxxx</td>
                <td id="sat-12" class="sat-9">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 12h30 -->
                <td>12h30</td>
                <td id="mon-1230" class="mon-10">xxxx</td>
                <td id="tue-1230" class="tue-10">xxxx</td>
                <td id="wed-1230" class="wed-10">xxxx</td>
                <td id="thu-1230" class="thu-10">xxxx</td>
                <td id="fri-1230" class="fri-10">xxxx</td>
                <td id="sat-1230" class="sat-10">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 13h -->
                <td>13h</td>
                <td id="mon-13" class="mon-11">xxxx</td>
                <td id="tue-13" class="tue-11">xxxx</td>
                <td id="wed-13" class="wed-11">xxxx</td>
                <td id="thu-13" class="thu-11">xxxx</td>
                <td id="fri-13" class="fri-11">xxxx</td>
                <td id="sat-13" class="sat-11">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 13h30 -->
                <td>13h30</td>
                <td id="mon-1330" class="mon-12">xxxx</td>
                <td id="tue-1330" class="tue-12">xxxx</td>
                <td id="wed-1330" class="wed-12">xxxx</td>
                <td id="thu-1330" class="thu-12">xxxx</td>
                <td id="fri-1330" class="fri-12">xxxx</td>
                <td id="sat-1330" class="sat-12">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 14h -->
                <td>14h</td>
                <td id="mon-14" class="mon-13">xxxx</td>
                <td id="tue-14" class="tue-13">xxxx</td>
                <td id="wed-14" class="wed-13">xxxx</td>
                <td id="thu-14" class="thu-13">xxxx</td>
                <td id="fri-14" class="fri-13">xxxx</td>
                <td id="sat-14" class="sat-13">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 14h30 -->
                <td>14h30</td>
                <td id="mon-1430" class="mon-14">xxxx</td>
                <td id="tue-1430" class="tue-14">xxxx</td>
                <td id="wed-1430" class="wed-14">xxxx</td>
                <td id="thu-1430" class="thu-14">xxxx</td>
                <td id="fri-1430" class="fri-14">xxxx</td>
                <td id="sat-1430" class="sat-14">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 15h -->
                <td>15h</td>
                <td id="mon-15" class="mon-15">xxxx</td>
                <td id="tue-15" class="tue-15">xxxx</td>
                <td id="wed-15" class="wed-15">xxxx</td>
                <td id="thu-15" class="thu-15">xxxx</td>
                <td id="fri-15" class="fri-15">xxxx</td>
                <td id="sat-15" class="sat-15">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 15h30 -->
                <td>15h30</td>
                <td id="mon-1530" class="mon-16">xxxx</td>
                <td id="tue-1530" class="tue-16">xxxx</td>
                <td id="wed-1530" class="wed-16">xxxx</td>
                <td id="thu-1530" class="thu-16">xxxx</td>
                <td id="fri-1530" class="fri-16">xxxx</td>
                <td id="sat-1530" class="sat-16">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 16h -->
                <td>16h</td>
                <td id="mon-16" class="mon-17">xxxx</td>
                <td id="tue-16" class="tue-17">xxxx</td>
                <td id="wed-16" class="wed-17">xxxx</td>
                <td id="thu-16" class="thu-17">xxxx</td>
                <td id="fri-16" class="fri-17">xxxx</td>
                <td id="sat-16" class="sat-17">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 16h30 -->
                <td>16h30</td>
                <td id="mon-1630" class="mon-18">xxxx</td>
                <td id="tue-1630" class="tue-18">xxxx</td>
                <td id="wed-1630" class="wed-18">xxxx</td>
                <td id="thu-1630" class="thu-18">xxxx</td>
                <td id="fri-1630" class="fri-18">xxxx</td>
                <td id="sat-1630" class="sat-18">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 17h -->
                <td>17h</td>
                <td id="mon-17" class="mon-19">xxxx</td>
                <td id="tue-17" class="tue-19">xxxx</td>
                <td id="wed-17" class="wed-19">xxxx</td>
                <td id="thu-17" class="thu-19">xxxx</td>
                <td id="fri-17" class="fri-19">xxxx</td>
                <td id="sat-17" class="sat-19">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 17h30 -->
                <td>17h30</td>
                <td id="mon-1730" class="mon-20">xxxx</td>
                <td id="tue-1730" class="tue-20">xxxx</td>
                <td id="wed-1730" class="wed-20">xxxx</td>
                <td id="thu-1730" class="thu-20">xxxx</td>
                <td id="fri-1730" class="fri-20">xxxx</td>
                <td id="sat-1730" class="sat-20">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 18h -->
                <td>18h</td>
                <td id="mon-18" class="mon-21">xxxx</td>
                <td id="tue-18" class="tue-21">xxxx</td>
                <td id="wed-18" class="wed-21">xxxx</td>
                <td id="thu-18" class="thu-21">xxxx</td>
                <td id="fri-18" class="fri-21">xxxx</td>
                <td id="sat-18" class="sat-21">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 18h30 -->
                <td>18h30</td>
                <td id="mon-1830" class="mon-22">xxxx</td>
                <td id="tue-1830" class="tue-22">xxxx</td>
                <td id="wed-1830" class="wed-22">xxxx</td>
                <td id="thu-1830" class="thu-22">xxxx</td>
                <td id="fri-1830" class="fri-22">xxxx</td>
                <td id="sat-1830" class="sat-22">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 19h -->
                <td>19h</td>
                <td id="mon-19" class="mon-23">xxxx</td>
                <td id="tue-19" class="tue-23">xxxx</td>
                <td id="wed-19" class="wed-23">xxxx</td>
                <td id="thu-19" class="thu-23">xxxx</td>
                <td id="fri-19" class="fri-23">xxxx</td>
                <td id="sat-19" class="sat-23">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 19h30 -->
                <td>19h30</td>
                <td id="mon-1930" class="mon-24">xxxx</td>
                <td id="tue-1930" class="tue-24">xxxx</td>
                <td id="wed-1930" class="wed-24">xxxx</td>
                <td id="thu-1930" class="thu-24">xxxx</td>
                <td id="fri-1930" class="fri-24">xxxx</td>
                <td id="sat-1930" class="sat-24">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 20 -->
                <td>20h</td>
                <td id="mon-20" class="mon-25">xxxx</td>
                <td id="tue-20" class="tue-25">xxxx</td>
                <td id="wed-20" class="wed-25">xxxx</td>
                <td id="thu-20" class="thu-25">xxxx</td>
                <td id="fri-20" class="fri-25">xxxx</td>
                <td id="sat-20" class="sat-25">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 20h30 -->
                <td>20h30</td>
                <td id="mon-2030" class="mon-26">xxxx</td>
                <td id="tue-2030" class="tue-26">xxxx</td>
                <td id="wed-2030" class="wed-26">xxxx</td>
                <td id="thu-2030" class="thu-26">xxxx</td>
                <td id="fri-2030" class="fri-26">xxxx</td>
                <td id="sat-2030" class="sat-26">xxxx</td>
            </tr>
            <tr>
                <!-- ligne 21h -->
                <td>21h</td>
                <td id="mon-21" class="mon-27">xxxx</td>
                <td id="tue-21" class="tue-27">xxxx</td>
                <td id="wed-21" class="wed-27">xxxx</td>
                <td id="thu-21" class="thu-27">xxxx</td>
                <td id="fri-21" class="fri-27">xxxx</td>
                <td id="sat-21" class="sat-27">xxxx</td>
            </tr>
        </table>
        <script src="js/parser.js"></script>
    </main>
</body>
</html>