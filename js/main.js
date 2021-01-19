class Main {
    constructor() {
        this.map = new Map();
        this.game = new Game();
    }

    newSetup() {
        this.setup = new Setup();
        this.map.updateSize(this.setup);
    }

    newPopulation() {
        this.population = new Population(1, 100);
    }

    tick() {
        this.game.step();
        // this.map.update();
    }
}

var main = undefined;

function onload() {
    main = new Main();
}