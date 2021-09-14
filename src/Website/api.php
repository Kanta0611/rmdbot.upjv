<?php

if (!isset($_GET["api"])) {
	echo "Please provide api type";
	return;
}

	// differents apis
	// getVersion
switch ($_GET["api"]) {
	case "getVersion":
		echo "a1.0";
		break;
}