const Event  = require("../Structures/Event.js");
const { MessageEmbed } = require("discord.js");

module.exports = new Event("messageCreate", (client, message) => {
    if (!message.content.startsWith(client.config.prefix)) return;
    const args = message.content.substring(client.config.prefix.length).split(/ +/);
    const command = client.commands.find(cmd => cmd.name === args[0]);

    if (!command) {
        const noCommandEmbed = new MessageEmbed()
            .setColor(client.config.colors.red)
            .setTitle(`Erreur : La commande \`${args[0]}\`n'existe pas`)
            .setDescription(`- Vérifiez l'orthographe et réessayez\n- Utilisez les commandes slash (/)\n- Tapez la commande \`${client.config.prefix}help\``);
            return message.reply({ embeds: [noCommandEmbed]})
    };

    command.run(message, args, client);
});