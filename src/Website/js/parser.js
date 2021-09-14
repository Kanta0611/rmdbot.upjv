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


        let idstart; // ID du cours

        // console.log(startCourse.minute)

        // si le cours est sur une heure "ronde" on met juste l'heure, si c'est sur une demi-heure on ajoute "30" derrière
        if (startCourse.minute == 0)
            idstart = `${startCourse.hour}`
        else
            idstart = `${startCourse.hour}${startCourse.minute}`;


        let tag = mapper(idstart);

        for (let j = 0; j < json.monday[i].hour.length; j++)
        {
            //tag += j
            // console.log(`i = ${i}\nj = ${j}\ntag = ${tag}`)
            updateHTML(`.mon-${tag + j}`, `${json.monday[i].name} - ${json.monday[i].room} - ${json.monday[i].teacher}`)
        }

    }

    // gestion du mardi
    for (let i = 0; i < json.tuesday.length; i++) {
        // heures et minutes du début du cours
        let startCourse = {
            hour: new Date(json.tuesday[i].hour.start).getHours() - 2,
            minute: new Date(json.tuesday[i].hour.start).getMinutes()
        }


        let idstart; // ID du cours

        // console.log(startCourse.minute)

        // si le cours est sur une heure "ronde" on met juste l'heure, si c'est sur une demi-heure on ajoute "30" derrière
        if (startCourse.minute == 0)
            idstart = `${startCourse.hour}`
        else
            idstart = `${startCourse.hour}${startCourse.minute}`;


        let tag = mapper(idstart);

        for (let j = 0; j < json.tuesday[i].hour.length; j++)
        {
            //tag += j
            // console.log(`i = ${i}\nj = ${j}\ntag = ${tag}`)
            updateHTML(`.tue-${tag + j}`, `${json.tuesday[i].name} - ${json.tuesday[i].room} - ${json.tuesday[i].teacher}`)
        }

    }

    // gestion du mercredi
    for (let i = 0; i < json.wednesday.length; i++) {
        // heures et minutes du début du cours
        let startCourse = {
            hour: new Date(json.wednesday[i].hour.start).getHours() - 2,
            minute: new Date(json.wednesday[i].hour.start).getMinutes()
        }


        let idstart; // ID du cours

        // console.log(startCourse.minute)

        // si le cours est sur une heure "ronde" on met juste l'heure, si c'est sur une demi-heure on ajoute "30" derrière
        if (startCourse.minute == 0)
            idstart = `${startCourse.hour}`
        else
            idstart = `${startCourse.hour}${startCourse.minute}`;


        let tag = mapper(idstart);

        for (let j = 0; j < json.wednesday[i].hour.length; j++)
        {
            //tag += j
            // console.log(`i = ${i}\nj = ${j}\ntag = ${tag}`)
            updateHTML(`.wed-${tag + j}`, `${json.wednesday[i].name} - ${json.wednesday[i].room} - ${json.wednesday[i].teacher}`)
        }

    }

    // gestion du jeudi
    for (let i = 0; i < json.thursday.length; i++) {
        // heures et minutes du début du cours
        let startCourse = {
            hour: new Date(json.thursday[i].hour.start).getHours() - 2,
            minute: new Date(json.thursday[i].hour.start).getMinutes()
        }


        let idstart; // ID du cours

        // console.log(startCourse.minute)

        // si le cours est sur une heure "ronde" on met juste l'heure, si c'est sur une demi-heure on ajoute "30" derrière
        if (startCourse.minute == 0)
            idstart = `${startCourse.hour}`
        else
            idstart = `${startCourse.hour}${startCourse.minute}`;


        let tag = mapper(idstart);

        for (let j = 0; j < json.thursday[i].hour.length; j++)
        {
            //tag += j
            // console.log(`i = ${i}\nj = ${j}\ntag = ${tag}`)
            updateHTML(`.thu-${tag + j}`, `${json.thursday[i].name} - ${json.thursday[i].room} - ${json.thursday[i].teacher}`)
        }

    }

    // gestion du vendredi
    for (let i = 0; i < json.friday.length; i++) {
        // heures et minutes du début du cours
        let startCourse = {
            hour: new Date(json.friday[i].hour.start).getHours() - 2,
            minute: new Date(json.friday[i].hour.start).getMinutes()
        }


        let idstart; // ID du cours

        // console.log(startCourse.minute)

        // si le cours est sur une heure "ronde" on met juste l'heure, si c'est sur une demi-heure on ajoute "30" derrière
        if (startCourse.minute == 0)
            idstart = `${startCourse.hour}`
        else
            idstart = `${startCourse.hour}${startCourse.minute}`;


        let tag = mapper(idstart);

        for (let j = 0; j < json.friday[i].hour.length; j++)
        {
            //tag += j
            // console.log(`i = ${i}\nj = ${j}\ntag = ${tag}`)
            updateHTML(`.fri-${tag + j}`, `${json.friday[i].name} - ${json.friday[i].room} - ${json.friday[i].teacher}`)
        }

    }

    // gestion du samedi
    for (let i = 0; i < json.saturday.length; i++) {
        // heures et minutes du début du cours
        let startCourse = {
            hour: new Date(json.saturday[i].hour.start).getHours() - 2,
            minute: new Date(json.saturday[i].hour.start).getMinutes()
        }


        let idstart; // ID du cours

        // console.log(startCourse.minute)

        // si le cours est sur une heure "ronde" on met juste l'heure, si c'est sur une demi-heure on ajoute "30" derrière
        if (startCourse.minute == 0)
            idstart = `${startCourse.hour}`
        else
            idstart = `${startCourse.hour}${startCourse.minute}`;


        let tag = mapper(idstart);

        for (let j = 0; j < json.saturday[i].hour.length; j++)
        {
            //tag += j
            // console.log(`i = ${i}\nj = ${j}\ntag = ${tag}`)
            updateHTML(`.sat-${tag + j}`, `${json.saturday[i].name} - ${json.saturday[i].room} - ${json.saturday[i].teacher}`)
        }

    }
}

let updateHTML = (CSSSelector, newVal) => {
    if (!CSSSelector || !newVal) throw new Error("Can't update HTML data");

    let tag = document.querySelector(CSSSelector);
    tag.innerHTML = newVal;
}

/**
 * 
 * @param {string} id 
 * @returns map for the handlefile loops
 */
let mapper = (id) => {
  switch (id) {
    default:
      throw new Error("Bad id was provided in the mapping function !");
      break;
    case "8":
      return 1;
      break;
    case "830":
      return 2;
      break;
    case "9":
      return 3;
      break;
    case "930":
      return 4;
      break;
    case "10":
      return 5;
      break;
    case "1030":
      return 6;
      break;
    case "11":
      return 7;
      break;
    case "1130":
      return 8;
      break;
    case "12":
      return 9;
      break;
    case "1230":
      return 10;
      break;
    case "13":
      return 11;
      break;
    case "1330":
      return 12;
      break;
    case "14":
      return 13;
      break;
    case "1430":
      return 14;
      break;
    case "15":
      return 15;
      break;
    case "1530":
      return 16;
      break;
    case "16":
      return 17;
      break;
    case "1630":
      return 18;
      break;
    case "17":
      return 19;
      break;
    case "1730":
      return 20;
      break;
    case "18":
      return 21;
      break;
    case "1830":
      return 22;
      break;
    case "19":
      return 23;
      break;
    case "1930":
      return 24;
      break;
    case "20":
      return 25;
      break;
    case "2030":
      return 26;
      break;
    case "21":
      return 27;
      break;
  }
};

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