const { MessageEmbed } = require("discord.js");
const Event = require("../Structures/Event.js");

function msToTime(ms) {
    let minutes = Math.floor(ms / (1000 * 60));
    let hours = Math.floor(ms / (1000 * 60 * 60));
    if (minutes === 0) return `${hours}`;
    else return `${hours}h${minutes}`;
  }

module.exports = new Event("classAlert", (client, alert) => {
    var firstdate = new Date(alert.start);
    var seconddate = new Date(alert.end);
    var duration = msToTime(seconddate.getTime() - firstdate.getTime());
    
    const alertEmbed = new MessageEmbed()
        .setColor(client.config.colors.blue)
        .setTitle(`Cours de ${alert.name} dans 15 minutes !`)
        .setDescription(`Lieu : ${alert.room}\nProfesseur : ${alert.teacher}\n Durée : ${duration}`)
});