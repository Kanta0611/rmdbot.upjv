let schedule;

/**
 * Fonction de gestion du fichier JSON
 * @param {String} json 
 */
let handleFile = (json) => {
    if (!json || typeof (json) != "object") throw new Error("No JSON data provided"); // dans le cas hypotétique où il y aurai pas d'objet en réponse

        // gestion du lundi
        for (let i = 0; i < json.monday.length; i++) {
            // heures et minutes du début du cours
            let startCourse = {
                hour: new Date(json.monday[i].hour.start).getHours() - 2,
                minute: new Date(json.monday[i].hour.start).getMinutes()
            }
            addElement(`.courses`, `[Lundi - ${startCourse.hour}:${startCourse.minute}] ${json.monday[i].name} - ${json.monday[i].room} - ${json.monday[i].teacher} <br>`)
            addElement("#editCourseSelector", `<option value="${json.monday[i].uuid}">Lundi - ${json.monday[i].name} - ${json.monday[i].room} - ${json.monday[i].teacher}</option>`)
        }

        for (let i = 0; i < json.tuesday.length; i++) {
            
            let startCourse = {
                hour: new Date(json.monday[i].hour.start).getHours() - 2,
                minute: new Date(json.monday[i].hour.start).getMinutes()
            }
            addElement(`.courses`, `[Mardi - ${startCourse.hour}:${startCourse.minute}] ${json.tuesday[i].name} - ${json.tuesday[i].room} - ${json.tuesday[i].teacher} <br>`)
            addElement("#editCourseSelector", `<option value="${json.tuesday[i].uuid}">Mardi - ${json.tuesday[i].name} - ${json.tuesday[i].room} - ${json.tuesday[i].teacher}</option>`)
        }

        
        for (let i = 0; i < json.wednesday.length; i++) {
            
            let startCourse = {
                hour: new Date(json.wednesday[i].hour.start).getHours() - 2,
                minute: new Date(json.wednesday[i].hour.start).getMinutes()
            }
            addElement(`.courses`, `[Mercredi - ${startCourse.hour}:${startCourse.minute}] ${json.wednesday[i].name} - ${json.wednesday[i].room} - ${json.wednesday[i].teacher} <br>`)
            addElement("#editCourseSelector", `<option value="${json.wednesday[i].uuid}">Mercredi - ${json.wednesday[i].name} - ${json.wednesday[i].room} - ${json.wednesday[i].teacher}</option>`)
        }

        
        for (let i = 0; i < json.thursday.length; i++) {
            
            let startCourse = {
                hour: new Date(json.monday[i].hour.start).getHours() - 2,
                minute: new Date(json.monday[i].hour.start).getMinutes()
            }
            addElement(`.courses`, `[Jeudi - ${startCourse.hour}:${startCourse.minute}] ${json.thursday[i].name} - ${json.thursday[i].room} - ${json.thursday[i].teacher} <br>`)
            addElement("#editCourseSelector", `<option value="${json.thursday[i].uuid}">Jeudi - ${json.thursday[i].name} - ${json.thursday[i].room} - ${json.thursday[i].teacher}</option>`)

        }

        
        for (let i = 0; i < json.friday.length; i++) {
            
            let startCourse = {
                hour: new Date(json.friday[i].hour.start).getHours() - 2,
                minute: new Date(json.friday[i].hour.start).getMinutes()
            }
            addElement(`.courses`, `[Vendredi - ${startCourse.hour}:${startCourse.minute}] ${json.friday[i].name} - ${json.friday[i].room} - ${json.friday[i].teacher} <br>`)
            addElement("#editCourseSelector", `<option value="${json.friday[i].uuid}">Vendredi - ${json.friday[i].name} - ${json.friday[i].room} - ${json.friday[i].teacher}</option>`)
            
        }

        
        for (let i = 0; i < json.saturday.length; i++) {
            
            let startCourse = {
                hour: new Date(json.saturday[i].hour.start).getHours() - 2,
                minute: new Date(json.saturday[i].hour.start).getMinutes()
            }
            addElement(`.courses`, `[Samedi - ${startCourse.hour}:${startCourse.minute}] ${json.saturday[i].name} - ${json.saturday[i].room} - ${json.saturday[i].teacher} <br>`)
            addElement("#editCourseSelector", `<option value="${json.saturday[i].uuid}">Samedi - ${json.saturday[i].name} - ${json.saturday[i].room} - ${json.saturday[i].teacher}</option>`)
        }
}

/**
 * Fonction ajoutant un élément enfant a une autre balise
 * @param CSSSelector
 * @param el
 */
let addElement = (CSSSelector, el) => {
    let parent = document.querySelector(CSSSelector);
    parent.innerHTML += el;
}

const URL_OF_THE_FILE = {
    DEV: "http://localhost/SimpleScheduleViewer/schedule.json",
    PROD: "xxx"
}
let scheduleFile = new XMLHttpRequest()

// fonction appelée à chaque changement d'état de la requête
scheduleFile.onreadystatechange = () => {
    if (scheduleFile.readyState == 4 && scheduleFile.status == 200) { // on regarde le statut de la requete, si elle est valide ET si elle est complète (statut 4) on traite le fichier
        handleFile(JSON.parse(scheduleFile.responseText)); // on envoie le JSON dans une fonction à part
        schedule =  JSON.parse(scheduleFile.responseText);
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