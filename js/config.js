function getJson(entity, propertyId, toTextArea = false, storeResult = false) {
    var url = 'https://logilutions.de/api/godmode/data/entities/' + propertyId + '/' + entity + '.json';
    console.log("called API-Request: '" + url + "'");

    $.getJSON(url).done(function(data) {
        console.log("received: '" + data.id + "'");
        json = JSON.stringify(data)
        if (toTextArea) {
            $("#propertiesText").val(json);
        }

        if (storeResult) {
            main.setup.datas[entity] = data;
        }
    });
}

function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}