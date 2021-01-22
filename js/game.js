class Game {
    constructor() {}

    step() {
        main.populations.forEach(population => {
            var i = 0;
            population.entities.forEach(entity => {

                if (entity.dead == true) main.populations[entity.data.id - 1].entities.splice(i, 1);

                entity.move(main);
                entity.eat();
                entity.checkHealth();
                entity.reproduction();

                i++;
            });
        });
    }
}