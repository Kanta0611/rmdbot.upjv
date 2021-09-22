const URL_OF_API = {
    dev: "http://localhost/SimpleScheduleViewer/api.php"
};

// boutons
let addCourseBtn = document.getElementById("addcourse");
let deleteCourseBtn = document.getElementById("deletecourse")
let editCourseBtn = document.getElementById("editcourse")
let editCourseSelector = document.getElementById('editCourseSelector');

// changement de valeur de chaque input lors du changement de choix dans le selecteur

// même fonction que décrite au dessus mais pour le cours sélectionné en premier par la page automatiquement
editCourseSelector.onchange = () => {
    let guid = editCourseSelector.value;

    let editTime = document.getElementById("editTime");
    let editCourseName = document.getElementById("editCourseName");
    let editCourseLength = document.getElementById("editCourseLength");
    let editCourseRoom = document.getElementById("editCourseRoom");
    let editCourseTeacher = document.getElementById("editCourseTeacher");

    let daysArray = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
    daysArray.forEach(day => {

        for(let i = 0; i < schedule[day].length; i++) {
            if (guid == schedule[day][i].uuid) {
                editTime.value = `${new Date(schedule[day][i].hour.start).getHours()}:${new Date(schedule[day][i].hour.start).getMinutes()}`
                editCourseLength.value = schedule[day][i].hour.length;
                editCourseName.value = schedule[day][i].name;
                editCourseRoom.value = schedule[day][i].room;
                editCourseTeacher.value = schedule[day][i].teacher;
            }
        }
    })
}

// event pour gérer le titre
addCourseBtn.onclick = () => {
    let course = {
        day: document.getElementById("addDaySelector").value,
        hour: document.getElementById("addTime").value,
        name: document.getElementById("addCourseName").value,
        room: document.getElementById("addCourseRoom").value,
        teacher: document.getElementById("addCourseTeacher").value,
        length: document.getElementById("addCourseLength").value
    }

    if (course.hour === "" || course.name === "" || course.room === "" || course.teacher === "" || course.length === "") {
        alert("Veuillez remplir tout les champs !");
        return false;
    }

    let isoString = new Date(new Date().setHours(timeParse(course.hour).hours + 2, timeParse(course.hour).minutes, 0, 0)).toISOString();

    let addxhr = new XMLHttpRequest();

    addxhr.onreadystatechange = () => {
        if (addxhr.status === 200 && addxhr.readyState === 4) {
            if (JSON.parse(addxhr.response).state === "OK") {
                alert("Emploi du temps modifié avec succès !");
                reload();
            }
        }
    }
    addxhr.responseType = "application/json";

    let discordID = new FormData();
    discordID.append('discordid', a(trapToSkids));

    addxhr.open("POST", URL_OF_API.dev + `?api=addCourse&day=${course.day}&name=${course.name}&room=${course.room}&start=${isoString}&length=${course.length}&teacher=${course.teacher}`);
    addxhr.send(discordID);
}

deleteCourseBtn.onclick = () => {
    let course = document.getElementById("editCourseSelector").value

    let delxhr = new XMLHttpRequest();

    delxhr.onreadystatechange = () => {
        if (delxhr.status === 200 && delxhr.readyState === 4) {
            if (JSON.parse(delxhr.response).state === "OK") {
                alert("Emploi du temps modifié avec succès !");
                reload();
            }
        }
    }
    delxhr.responseType = "application/json";

    let discordID = new FormData();
    discordID.append('discordid', a(trapToSkids));

    delxhr.open("POST", URL_OF_API.dev + `?api=removeCourse&guid=${course}`);
    delxhr.send(discordID);
}

editCourseBtn.onclick = () => {

    let course = {
        guid: document.getElementById("editCourseSelector").value,
        hour: document.getElementById("editTime").value,
        name: document.getElementById("editCourseName").value,
        room: document.getElementById("editCourseRoom").value,
        teacher: document.getElementById("editCourseTeacher").value,
        length: document.getElementById("editCourseLength").value
    }

    let isoString = new Date(new Date().setHours(timeParse(course.hour).hours + 2, timeParse(course.hour).minutes, 0, 0)).toISOString();

    if (course.hour === "" || course.name === "" || course.room === "" || course.teacher === "" || course.length === "") {
        alert("Veuillez remplir tout les champs !");
        return false;
    }

    let editxhr = new XMLHttpRequest();

    editxhr.onreadystatechange = () => {
        if (editxhr.status === 200 && editxhr.readyState === 4) {
            if (JSON.parse(editxhr.response).state === "OK") {
                alert("Emploi du temps modifié avec succès !");
                reload();
            }
        }
    }
    editxhr.responseType = "application/json";

    let discordID = new FormData();
    discordID.append('discordid', a(trapToSkids));

    editxhr.open("POST", URL_OF_API.dev + `?api=editCourse&guid=${course.guid}&name=${course.name}&room=${course.room}&start=${isoString}&length=${course.length}&teacher=${course.teacher}`);
    editxhr.send(discordID);


}

/**
 * Fonction pour parser le temps dans l'input en HTML
 * @param string
 *
 * @return Object Retourne un objet avec le temps
 */
function timeParse(time) {
    let timeArray = time.split(':');

    return {
        hours: timeArray[0],
        minutes: timeArray[1]
    };
}

/**
 * Fonction rechargeant la page
 */
function reload() {
    window.location = "editor.php";
}