export class Level {

    nmbOfProblems;
    problems = [];
    lives = 3;

    //genera valores aleatorios, que será el orden en el que saldrán los problemas
    getRandomOrder = function(){
        let order = [], indexToPush = 0;
        for (let i = 0; i < this.nmbOfProblems; i++) {
            indexToPush = Math.floor(Math.random() * this.problems.length);
            if (order.includes(indexToPush) || indexToPush == this.problems.length) {
                /*si el índice de la operación ya está en el arreglo,
                    o el Math.random generó 1 (saldrá error), entonces reinicia el ciclo */
                i--;
                continue;
            } else {
                order.push(indexToPush);
            }
        }
        return order;
    }

    constructor(problems, nmbOfProblems, g, lvl) {
        this.problems = problems; //objeto con los problemas
        this.nmbOfProblems = nmbOfProblems; //numero de problemas que tendrá el nivel
        this.order = this.getRandomOrder();
        this.actualIndex = 0; //índice de la operación actual
        console.log("level info:");
        console.log("problem order: "+this.order);
        console.log("player grade: "+g);
        console.log("level: "+lvl+", number of problems: "+nmbOfProblems);
    }

}
