// fonction de traitement de fichier
let handleFile = (json) => {
    if (!json || typeof(json) != "object") throw new Error("No JSON data provided"); // dans le cas hypotétique où il y aurai pas d'objet en réponse

    for (let i  = 0; i < json.monday.length; i++)
    {
        let startCourse = {
            hour: new Date(json.monday[i].hour.start).getHours() - 2,
            minute: new Date(json.monday[i].hour.start).getMinutes()
        }

        let stopCourse = {
            hour: new Date(json.monday[i].hour.end).getHours() - 2,
            minute: new Date(json.monday[i].hour.end).getMinutes()
        }

        let courseLength = stopCourse.hour - startCourse.hour

        let idstart;
        
        console.log(startCourse.minute)
        if (startCourse.minute == 0)
            idstart = `${startCourse.hour}`
        else
            idstart = `${startCourse.hour}${startCourse.minute}`;
        
        console.log("mon-" + idstart)
        updateHTML("#mon-" + idstart, json.monday[i].name)
        console.log("durée " + courseLength);
    }
    

}

let updateHTML = (CSSSelector, newVal) => {
    if (!CSSSelector || !newVal) throw new Error("Can't update HTML data");

    let tag = document.querySelector(CSSSelector);
    tag.innerHTML = newVal;
}

// on charge le fichier JSON dans le JS lors du chargmeent
const URL_OF_THE_FILE = {
    DEV: "http://localhost/SimpleScheduleViewer/schedule.json",
    PROD: "xxx"
}
let scheduleFile = new XMLHttpRequest()

// fonction appelée à chaque changement d'état de la requête
scheduleFile.onreadystatechange = () => {
    if (scheduleFile.readyState == 4 && scheduleFile.status == 200) { // on regarde le statut de la requete, si elle est valide ET si elle est complète (statut 4) on traite le fichier
        handleFile(JSON.parse(scheduleFile.responseText)); // on envoie le JSON dans une fonction à part
    }
}

scheduleFile.responseType = "application/json";
scheduleFile.open("GET", URL_OF_THE_FILE.DEV, false);

// on try/catch l'envoi de la requête
try {
    scheduleFile.send();
}
catch (e) {
    console.error(e);
}