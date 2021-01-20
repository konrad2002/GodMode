class Main {
    constructor() {
        this.map = new Map();
        this.game = new Game();
        this.data = undefined;
    }

    newSetup() {
        this.setup = new Setup();
        this.map.updateSize(this.setup);
    }

    newPopulation() {
        this.populations = [];

        if ($("#selectCC").val()) {
            this.populations.push(
                new Population(
                    "cc",
                    $("#populationSizeCC").val()
                )
            );
        }

        if ($("#selectRC").val()) {
            this.populations.push(
                new Population(
                    "rc",
                    $("#populationSizeRC").val()
                )
            );
        }

        if ($("#selectMS").val()) {
            this.populations.push(
                new Population(
                    "ms",
                    $("#populationSizeMS").val()
                )
            );
        }
    }

    newGenerations() {
        this.populations.forEach(population => {
            population.generateGeneration();
        });
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