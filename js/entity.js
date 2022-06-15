class Entity {
    constructor(eType, setup, x, y) {
        this.type = eType;

        this.pos = {
            x: x,
            y: y
        }

        this.data = main.setup.datas[eType];

        this.newDirection;
        this.dead = false;

        this.food = this.data.properties.neededMass / 2;
        // this.consumption = ((this.food / 30) / (this.data.properties.speed / 100));

        this.consumption = ((this.data.properties.neededMass / 2) / 30) / 24;

        this.uuid = uuidv4();
    }

    move() {

        var r = getRandomInt(0, 100);

        if (r > 0 && r <= this.data.properties.speed) {
            this.newDirection = getRandomInt(0, 3);

            var index = main.coords[this.pos.x][this.pos.y].indexOf(this);
            if (index !== -1) {
                main.coords[this.pos.x][this.pos.y].splice(index, 1);
            }

            if (this.newDirection == 0 && this.pos.y > 0) {
                this.pos.y--;
            }
            if (this.newDirection == 1 && this.pos.x < main.setup.width - 1) {
                this.pos.x++;
            }
            if (this.newDirection == 2 && this.pos.y < main.setup.height - 1) {
                this.pos.y++;
            }
            if (this.newDirection == 3 && this.pos.x > 0) {
                this.pos.x--;
            }

            main.coords[this.pos.x][this.pos.y].push(this);

        }
        this.food -= this.consumption;
    }

    reproduction() {

        var r2 = getRandomInt(0, 10000);

        if ((r2 > 0 && r2 <= this.data.properties.reproduction.childs * 100) &&
            (
                (this.food > this.data.properties.neededMass / 2) ||
                (this.data.properties.reproduction.type == "plant")
            )
        ) {
            if (main.populations[this.data.id - 1].entities.length < 2) {
                console.warn("can't reproduct because of missing partner");
            } else {
                main.populations[this.data.id - 1].addEntity();
                this.food -= this.data.properties.neededMass / 3;
            }
        }

    }

    eat() {
        main.populations.forEach(population => {
            // if (!(
            //         (this.data.name == "ms" && population.type == "cc") &&
            //         (this.data.name == "cc" && population.type == "ms") &&
            //         (this.data.name == population.type)
            //     ) || this.data.name == "cc") {

            main.coords[this.pos.x][this.pos.y].forEach(entity => {
                    if (entity.pos.x == this.pos.x && entity.pos.y == this.pos.y) {

                        if (entity.uuid != this.uuid) {
                            if (entity.data.properties.strength < this.data.properties.strength) {
                                console.log(entity.data.properties.strength + " meets " + this.data.properties.consumes);
                                if (
                                    this.data.properties.consumes[0] <= entity.data.properties.strength &&
                                    this.data.properties.consumes[1] >= entity.data.properties.strength
                                ) {
                                    entity.dead = true;
                                    console.log(this.data.fullName + " killed " + entity.data.fullName);
                                    this.food += entity.data.properties.mass;
                                }
                            }

                            if (
                                entity.data.properties.reproduction.type == "plant" && this.data.properties.reproduction.type == "plant" &&
                                entity.dead == false && this.dead == false
                            ) {
                                console.log("killed plant");
                                entity.dead = true;
                            }
                        }
                    }
                })
                // }
        });
    }

    checkHealth() {

        if (this.food <= 0 && this.data.properties.reproduction.type == "animal") {
            this.dead = true;
            console.log(this.data.name + " died: too less food");
        }

    }
}