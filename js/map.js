class Map {
    constructor() {
        console.log("Map object created");
        this.canvas = document.getElementById('canvas_map');

        if (this.canvas.getContext) {
            this.ctx = this.canvas.getContext('2d');
        }

        this.fieldsize = 20;
    }

    updateSize(setup) {
        this.canvas.style.width = (setup.width * this.fieldsize) + "px";
        this.canvas.style.height = (setup.height * this.fieldsize) + "px";
        this.canvas.width = (setup.width * this.fieldsize);
        this.canvas.height = (setup.height * this.fieldsize);
        // width
        for (let i = 0; i < setup.width; i++) {
            this.ctx.beginPath();
            this.ctx.moveTo(i * this.fieldsize, 0);
            this.ctx.lineTo(i * this.fieldsize, setup.height * this.fieldsize);
            this.ctx.closePath();
            this.ctx.stroke();
        }

        // height
        for (let i = 0; i < setup.height; i++) {
            this.ctx.beginPath();
            this.ctx.moveTo(0, i * this.fieldsize);
            this.ctx.lineTo(setup.width * this.fieldsize, i * this.fieldsize);
            this.ctx.closePath();
            this.ctx.stroke();
        }
    }

    update(populations, setup) {
        this.updateSize(setup);
        populations.forEach(population => {
            population.entities.forEach(entity => {
                this.ctx.font = this.fieldsize + "px Comic Sans MS";
                this.ctx.fillStyle = "red";
                this.ctx.textAlign = "center";
                this.ctx.fillText(entity.data.symbol, entity.pos.x * this.fieldsize + 10, entity.pos.y * this.fieldsize + 18);
            });
        });
    }
}