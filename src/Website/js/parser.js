// fonction de traitement de fichier
let handleFile = (json) => {
    if (!json || typeof(json) != "object") throw new Error("No JSON data provided"); // dans le cas hypotétique où il y aurai pas d'objet en réponse

    

}

let updateHTML = (CSSSelector, newVal) => {
    if (!CSSSelector || !newVal) throw new Error("Can't update HTML data");

    let tag = document.querySelector(CSSSelector);
    tag.innerHTML = newVal;
}

updateHTML("#machine", "toast")

// on charge le fichier JSON dans le JS lors du chargmeent
const URL_OF_THE_FILE = "http://localhost/SimpleScheduleViewer/schedule.json";
let scheduleFile = new XMLHttpRequest()

// fonction appelée à chaque changement d'état de la requête
scheduleFile.onreadystatechange = () => {
    if (scheduleFile.readyState == 4 && scheduleFile.status == 200) { // on regarde le statut de la requete, si elle est valide ET si elle est complète (statut 4) on traite le fichier
        handleFile(JSON.parse(scheduleFile.responseText)); // on envoie le JSON dans une fonction à part
    }
}

scheduleFile.responseType = "application/json";
scheduleFile.open("GET", URL_OF_THE_FILE, false);

// on try/catch l'envoi de la requête
try {
    scheduleFile.send();
}
catch (e) {
    console.error(e);
}