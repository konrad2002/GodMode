$(document).ready(function() {

    $("#setupBtn").click(function() {

        main.newSetup($("#propertyId").val());

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

    $("#startLoopBtn").click(function() {

        main.toggleLoop();

    });



    $("#selectCC").click(function() {
        getJson("cc", main.setup.propertyId, true);
    });

    $("#selectRC").click(function() {
        getJson("rc", main.setup.propertyId, true);
    });

    $("#selectMS").click(function() {
        getJson("ms", main.setup.propertyId, true);
    });


    $("#propertyId").change(function() {
        main.setup.propertyId = $("#propertyId").val();
    });

});