/**
 * Traite le fichier JSON
 * @param {String} json prend en compte l'objet JSON retourné par l'appel ajax 
 */
let handleFile = (json) => {
    if (!json || typeof (json) != "object") throw new Error("No JSON data provided"); // dans le cas hypotétique où il y aurai pas d'objet en réponse

    let days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];

    days.forEach(day => {
       for (let i = 0; i < json[day].length; i++) {
           let startCourse = {
               hour: new Date(json[day][i].hour.start).getHours() - 2,
               minutes: new Date(json[day][i].hour.start).getMinutes()
           };

           let idstart; // id du cours

           if (startCourse == 0) {
               idstart = `${startCourse.hour}`;
           } else {
               idstart = `${startCourse.hour}${startCourse.minutes}`;
           }

           let tag = mapper(idstart);
           for (let j = 0; j < json[day][i].hour.length; j++) {
               updateHTML(`.${day.substr(0,3)}-${tag + j}`, `${json[day][i].name} - ${json[day][i].room} - ${json[day][i].teacher}`)
           }
       }
    });
}

/**
 * 
 * @param {String} CSSSelector Selecteur AU FORMAT CSS !!! d'un element HTML
 * @param {String} newVal Nouvel élément HTML qui remplacera l'ancien
 */
let updateHTML = (CSSSelector, newVal) => {
    if (!CSSSelector || !newVal) throw new Error("Can't update HTML data");

    let tag = document.querySelector(CSSSelector);
    tag.innerHTML = newVal;
}

/**
 * 
 * @param {string} id 
 * @returns retourne l'id correct (format HHMM a X) (H représente des heures, M des minutes et X un ID allant de 1 à 27)
 */
let mapper = (id) => {
  switch (id) {
    default:
      throw new Error("Bad id was provided in the mapping function !");
    case "8":
      return 1;
    case "830":
      return 2;
    case "9":
      return 3;
    case "930":
      return 4;
    case "10":
      return 5;
    case "1030":
      return 6;
    case "11":
      return 7;
    case "1130":
      return 8;
    case "12":
      return 9;
    case "1230":
      return 10;
    case "13":
      return 11;
    case "1330":
      return 12;
    case "14":
      return 13;
    case "1430":
      return 14;
    case "15":
      return 15;
    case "1530":
      return 16;
    case "16":
      return 17;
    case "1630":
      return 18;
    case "17":
      return 19;
    case "1730":
      return 20;
    case "18":
      return 21;
    case "1830":
      return 22;
    case "19":
      return 23;
    case "1930":
      return 24;
    case "20":
      return 25;
    case "2030":
      return 26;
    case "21":
      return 27;
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