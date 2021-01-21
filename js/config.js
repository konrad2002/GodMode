function getJson(entity, toTextArea = false) {
    $.getJSON('https://logilutions.de/api/godmode/data/entities/' + $("#propertyId").val() + '/' + entity + '.json', function(data) {
        if (toTextArea) {
            main.data = data;
            $("#propertiesText").val(JSON.stringify(data));
        }
    });
}

function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}