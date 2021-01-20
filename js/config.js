function getJson(entity, toTextArea) {
    $.getJSON('https://logilutions.de/api/godmode/data/entities/' + $("#propertyId").val() + '/' + entity + '.json', function(data) {
        if (toTextArea) {
            main.data = data;
            $("#propertiesText").val(JSON.stringify(data));
        } else {
            return data;
        }
    });
}