class Population {
    constructor(type, size) {
        this.type = type;
        this.size = size;
    }

    generateGeneration(setup) {
        this.entities = [];
        for (let i = 0; i < this.size; i++) {
            this.entities.push(new Entity(this.type, setup));
        }
    }
}