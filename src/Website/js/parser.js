// fonction de traitement de fichier
let handleFile = (json) => {
    if (!json || typeof (json) != "object") throw new Error("No JSON data provided"); // dans le cas hypotétique où il y aurai pas d'objet en réponse

    // gestion du lundi
    for (let i = 0; i < json.monday.length; i++) {
        // heures et minutes du début du cours
        let startCourse = {
            hour: new Date(json.monday[i].hour.start).getHours() - 2,
            minute: new Date(json.monday[i].hour.start).getMinutes()
        }

        // heure et minute du début du cours
        let stopCourse = {
            hour: new Date(json.monday[i].hour.end).getHours() - 2,
            minute: new Date(json.monday[i].hour.end).getMinutes()
        }

        // obtient le temps (en ms) d'un cours, diviser par 1800000 pour avoir le temps en demi-heures
        let courseLength = new Date(json.monday[i].hour.end) - new Date(json.monday[i].hour.start)
        console.log("temps :" + courseLength / 1800000);

        let idstart; // ID du cours

        // console.log(startCourse.minute)

        // si le cours est sur une heure "ronde" on met juste l'heure, si c'est sur une demi-heure on ajoute "30" derrière
        if (startCourse.minute == 0)
            idstart = `${startCourse.hour}`
        else
            idstart = `${startCourse.hour}${startCourse.minute}`;

        console.log(courseLength); // of affiche la durée du cours en demi-heures (débug, à retirer après)

        // on remplit le tableau
        /* for (let j = 0; j < courseLength / 1800000; j++) {
            console.log(json.monday[i].name)

            // on regarde si on fait sur une demi-heure ou non
            if (idstart.includes('30', 2)) {
                taghour = Number(idstart);
            } else {
                taghour = Number(idstart) + j;
            }

            if (j % 2 == 0)
            {
                updateHTML(`#mon-${taghour}`, `${json.monday[i].name} - ${json.monday[i].room} - ${json.monday[i].teacher}`) // on met à jour l'HTML
            }
            else
            {
                updateHTML(`#mon-${taghour}30`, `${json.monday[i].name} - ${json.monday[i].room} - ${json.monday[i].teacher}`)
            }
    
        } */
        let tag;
        for (let j = 0; j < json.monday[1].length; j++)
        {
            if (idstart.includes('30', 2)) {
                tag = Number(idstart);
            } else {
                tag = Number(idstart) + j;
            }
            console.log(tag)
        }

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