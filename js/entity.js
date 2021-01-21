class Entity {
    constructor(eType, setup) {
        this.type = eType;
        this.pos = {
            x: getRandomInt(0, setup.width - 1),
            y: getRandomInt(0, setup.height - 1)
        }

        this.data = getJson(eType);
    }
}