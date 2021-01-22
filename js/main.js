class Main {
    constructor() {
        this.map = new Map();
        this.game = new Game();

        this.loopRunning = false;
        this.timer = null;

        this.steps = 0;

    }

    newSetup(propertyId) {
        this.setup = new Setup(propertyId);
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

        this.newGenerations();
    }

    newGenerations() {
        this.populations.forEach(population => {
            population.generateGeneration(this.setup);
        });
    }

    tick() {
        main.game.step();
        main.map.update(main.populations, main.setup);

        main.steps++;
        $("#statsSteps").html(main.steps);
        $("#statsDays").html(Math.round(main.steps / 24));
        $("#statsMonths").html(Math.round(main.steps / 720));
        $("#statsNCC").html(main.populations[0].entities.length);
        $("#statsNRC").html(main.populations[1].entities.length);
        $("#statsNMS").html(main.populations[2].entities.length);
    }

    toggleLoop() {
        if (this.loopRunning) {
            setTimeout(this.timer, 100);
            this.loopRunning = false;
        } else {
            this.timer = setInterval(this.tick, this.setup.speed);
            this.loopRunning = true;
        }
    }
}

var main = undefined;

function onload() {
    main = new Main();
}