function getJson(entity, propertyId, toTextArea = false, storeResult = false) {
    var url = '/godmode/data/entities/' + propertyId + '/' + entity + '.json';
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

function getRandomOffset() {
    offsets = [
        getRandomInt(-1, 1),
        getRandomInt(-1, 1)
    ];

    return offsets;
}

function uuidv4() {
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = Math.random() * 16 | 0,
            v = c == 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(16);
    });
}