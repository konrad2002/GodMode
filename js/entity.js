class Entity {
    constructor(eType, setup) {
        this.type = eType;
        this.pos = {
            x: getRandomInt(0, setup.width - 1),
            y: getRandomInt(0, setup.height - 1)
        }

        this.data = main.setup.datas[eType];

        this.newDirection;
    }

    move(main) {
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
    }
}