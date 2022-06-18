class Game {
    constructor() {}

    step() {
        main.populations.forEach(population => {
            var i = 0;
            population.entities.forEach(entity => {

                if (entity.dead) {
                    var index = main.coords[entity.pos.x][entity.pos.y].indexOf(entity);
                    if (index !== -1) {
                        main.coords[entity.pos.x][entity.pos.y].splice(index, 1);
                    }
                    console.log("you're dead bro: " + entity.uuid);
                    population.entities.splice(i, 1);
                }

                entity.move();
                entity.eat();
                entity.checkHealth();
                entity.reproduction();

                i++;
            });
        });
    }
}