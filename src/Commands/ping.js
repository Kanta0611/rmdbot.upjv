const Command = require('../Structures/Command.js');

module.exports = new Command({
    name: "ping",
    description: "Montre la latence du bot et de l'API.",

    async run(message, args, client) {
        const msg = await message.reply(`ping`);

        msg.edit(`Ping de l'API: \`${client.ws.ping} ms\`\nPing du bot: \`${msg.createdTimestamp - message.createdTimestamp} ms\``);
    }
})