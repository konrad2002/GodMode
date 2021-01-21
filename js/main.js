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

        if ($("#selectCC").is(":checked")) {
            this.populations.push(
                new Population(
                    "cc",
                    $("#populationSizeCC").val()
                )
            );
        }

        if ($("#selectRC").is(":checked")) {
            this.populations.push(
                new Population(
                    "rc",
                    $("#populationSizeRC").val()
                )
            );
        }

        if ($("#selectMS").is(":checked")) {
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
            population.generateGeneration(this.setup);
        });
    }

    tick() {
        this.game.step();
        this.map.update(this.populations);
    }
}

var main = undefined;

function onload() {
    main = new Main();
}