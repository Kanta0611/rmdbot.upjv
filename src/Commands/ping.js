const Command = require('../Structures/Command.js');

module.exports = new Command({
    name: "ping",
    description: "Montre la latence du bot et de l'API.",

    async run(message, args, client) {
        const msg = await message.reply(`🏓`);

        msg.edit(`Ping du bot: \`${client.ws.ping} ms\`\nPing de l'API: \`${msg.createdTimestamp - message.createdTimestamp} ms\``);
    }
})