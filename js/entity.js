class Entity {
    constructor(eType, setup, x = null, y = null) {
        this.type = eType;

        if (x === null || y === null) {
            this.pos = {
                x: getRandomInt(0, setup.width - 1),
                y: getRandomInt(0, setup.height - 1)
            }
        } else {
            this.pos = {
                x: x,
                y: y
            }
        }

        this.data = main.setup.datas[eType];

        this.newDirection;
        this.dead = false;

        this.food = this.data.properties.neededMass;
    }

    move(main) {

        var r = getRandomInt(0, 100);

        if (r > 0 && r <= this.data.properties.speed) {
            this.newDirection = getRandomInt(0, 3);

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

            this.food--;
        }
    }

    reproduction() {

        var r2 = getRandomInt(0, 10000);

        if (r2 > 0 && r2 <= ((this.data.properties.reproduction.childs / 720) * 10000)) {
            var offsetX = 0;
            var offsetY = 0;
            if (this.data.properties.reproduction.type == "plant") {
                while (offsetX == 0 && offsetY == 0) {
                    var offsets = getRandomOffset();
                    offsetX = offsets[0];
                    offsetY = offsets[1];
                }
            }
            main.populations[this.data.id - 1].addEntity(this.pos.x + offsetX, this.pos.y + offsetY);
        }

    }

    eat() {
        main.populations.forEach(population => {

            if (population.type != this.data.name) {
                population.entities.forEach(entity => {

                    if (entity.pos.x == this.pos.x && entity.pos.y == this.pos.y) {
                        console.log("two on same field");
                        if (entity.data.properties.strength < this.data.properties.strength) {
                            entity.dead = true;
                            console.log(this.data.fullName + " killed " + entity.data.fullName);
                        }

                        if (entity.data.properties.reproduction.type == "plant" == this.data.properties.reproduction.type) entity.dead = true;
                    }

                });
            }
        });
    }
}