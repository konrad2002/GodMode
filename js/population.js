class Population {
    constructor(type, size) {
        this.type = type;
        this.size = size;
    }

    generateGeneration() {
        this.entities = [];
        for (let i = 0; i < this.size; i++) {
            this.addEntity();
        }
    }

    addEntity(x = null, y = null) {

        if (x === null || y === null) {
            x = getRandomInt(0, main.setup.width - 1);
            y = getRandomInt(0, main.setup.height - 1);
        }

        var entity = new Entity(this.type, main.setup, x, y);
        this.entities.push(entity);
        main.coords[x][y].push(entity);
    }
}