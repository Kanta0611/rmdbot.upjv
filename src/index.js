const Client = require("./Structures/Client.js");
const Command = require('./Structures/Command.js');
const { token, prefix, colors } = require('./Data/config.json');
const client = new Client();
const fs = require("fs");
const { MessageEmbed } = require("discord.js");

fs.readdirSync("./src/Commands")
    .filter(file => file.endsWith(".js"))
    .forEach(file => {
        /**
         * @type {Command} 
         */
        const command = require(`./commands/${file}`)
        console.log(`Commande chargée: ${command.name}`)
        client.commands.set(command.name, command)
    });

client.on("ready", () => console.log(`${client.user.tag} est en ligne`));

client.on("messageCreate", message => {
    if (!message.content.startsWith(prefix)) return;
    const args = message.content.substring(prefix.length).split(/ +/);
    const command = client.commands.find(cmd => cmd.name === args[0]);

    if (!command) {
        const noCommandEmbed = new MessageEmbed()
            .setColor(colors.red)
            .setTitle("Erreur : La commande n'existe pas")
            .setDescription(`- Vérifiez l'orthographe et réessayez\n- Utilisez les commandes slash (/)\n- Tapez la commande \`${prefix}help\``);
            return message.reply({ embeds: [noCommandEmbed]})
    };

    command.run(message, args, client);
});

client.login(token);