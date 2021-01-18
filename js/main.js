class Main {
    constructor() {
        this.map = new Map();
    }

    newSetup() {
        this.setup = new Setup();
        this.map.updateSize(this.setup);
    }
}

var main = undefined;

function onload() {
    main = new Main();
}