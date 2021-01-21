class Game {
    constructor() {}

    step(main) {
        main.populations.forEach(population => {
            population.entities.forEach(entity => {
                entity.move(main);
            });
        });
    }
}