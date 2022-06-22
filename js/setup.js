class Setup {
    constructor(propertyId) {
        this.width = $("#width").val();
        this.height = $("#height").val();
        this.speed = $("#speed").val();
        this.maprate = $("#maprate").val();
        this.graphrate = $("#graphrate").val();
        this.propertyId = propertyId;

        this.datas = [];

        getJson("cc", this.propertyId, false, true);
        getJson("rc", this.propertyId, false, true);
        getJson("ms", this.propertyId, false, true);
    }
}