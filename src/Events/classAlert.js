const { MessageEmbed } = require("discord.js");
const Event = require("../Structures/Event.js");

module.exports = new Event("classAlert", (client, alert) => {
    const alertEmbed = new MessageEmbed()
        .setColor(client.config.colors.blue)
        .setTitle(`Cours de ${alert.name} dans 15 minutes !`)
        .setDescription(`Lieu : ${alert.place}\nProfesseur : ${alert.teacher}\n Durée :`)
});