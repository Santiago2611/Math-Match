class Problem {
    operation;
    answers = [];
    rightAnswer;

    constructor(op, ans, rightans) {
        this.operation = op;
        this.answers = ans;
        this.rightAnswer = rightans;
    }
}

export class Level {

    //las respuestas se imprimen en el sentido de las agujas del reloj (arriba - derecha - abajo - izquierda)
    problems = [
        new Problem("15 + 16", [23,29,31,30], 23),
        new Problem("40 / 4", [10,20,10,30], 10),
        new Problem("responder 1", [1,3,0,4], 1),
        new Problem("25 * 5 - 4", [121,125,25,44], 121),
        new Problem("responder 5", [5,12,4,3], 5),
        new Problem("responder 60", [12,50,51,60], 60),
        new Problem("responder 32", [40,32,23,233], 32),
    ];

    //genera valores aleatorios, que será el orden en el que saldrán los problemas
    getRandomOrder = function(){
        let order = [], indexToPush = 0;
        let len = this.problems.length;
        for (let i = 0; i < len; i++) {
            indexToPush = Math.floor(Math.random() * len);
            if (order.includes(indexToPush) || indexToPush == len) {
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

    constructor() {
        this.order = this.getRandomOrder();
        this.actualIndex = 0; //índice de la operación actual
    }

}
