$(document).ready(function() {

    $("#setupBtn").click(function() {

        main.newSetup();

    });

    $("#newPopulationBtn").click(function() {

        main.newPopulation();

    });

    $("#newGenerationBtn").click(function() {

        main.population.generateGeneration();

    });

    $("#doStepBtn").click(function() {

        main.tick();

    });

});