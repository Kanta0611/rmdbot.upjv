const Discord = require("discord.js");
const config = require("../Data/config.json");
const Command = require("./Command");
const Event = require("./Event");
const intents = new Discord.Intents(32767);
const fs = require("fs");

class Client extends Discord.Client {
    constructor() {
        super({intents});
        /**
         * @type {Discord.Collection<string, Command>}
         */
        this.commands = new Discord.Collection();
        this.config = config;
    }

    start(token) {
        fs.readdirSync("./src/Commands")
            .filter(file => file.endsWith(".js"))
            .forEach(file => {
                /**
                 * @type {Command} 
                 */
                const command = require(`../commands/${file}`);
                
                console.log(`Commande chargée: ${command.name}`);
                this.commands.set(command.name, command);
            });
        fs.readdirSync("./src/Events")
            .filter(file => file.endsWith(".js"))
            .forEach(file => {
                /**
                 * @type {Event}
                 */
                const event = require(`../events/${file}`);

                console.log(`Evènement chargé: ${event.event}`);
                this.on(event.event, event.run.bind(null, this));
            });
        this.login(token);
    }
}

module.exports = Client;