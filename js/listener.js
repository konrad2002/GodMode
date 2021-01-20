$(document).ready(function() {

    $("#setupBtn").click(function() {

        main.newSetup();

    });

    $("#newPopulationBtn").click(function() {

        main.newPopulation();

    });

    $("#newGenerationBtn").click(function() {

        main.newGenerations();

    });

    $("#doStepBtn").click(function() {

        main.tick();

    });

    $("#selectCC").click(function() {
        getJson("cc", true);
    });

    $("#selectRC").click(function() {
        getJson("rc", true);
    });

    $("#selectMS").click(function() {
        getJson("ms", true);
    });

});