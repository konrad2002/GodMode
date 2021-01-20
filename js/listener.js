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

    $("#selectCC").click(function() {
        $.getJSON('https://logilutions.de/api/godmode/data/enities/' + $("#propertyId").val() + '/cc.json', function(data) {
            $("#propertiesText").val(data);
        });
    });

    $("#selectRC").click(function() {
        $.getJSON('https://logilutions.de/api/godmode/data/enities/' + $("#propertyId").val() + '/rc.json', function(data) {
            $("#propertiesText").val(data);
        });
    });

    $("#selectMS").click(function() {
        $.getJSON('https://logilutions.de/api/godmode/data/enities/' + $("#propertyId").val() + '/ms.json', function(data) {
            $("#propertiesText").val(data);
        });
    });

});