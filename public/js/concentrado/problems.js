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

//binomios, polinomios, factorización, factor común
const EIGHT_GRADE_PROBLEMS = [
    new Problem("7x + 2x", ["9x","5x","7x^2","9"], "9x"),
    new Problem("–33 + 97", [64,62,120,-64], 64),
    new Problem("4^4", [296,256,16,161], 296),
    new Problem("(2+2) (10*3) / 2", [17,12,44,22], 17),
    new Problem("(20+10)^2", [300, 210, 60, 900], 900),
    new Problem("2x . 4x", ["6x","6","8x","x^4"], "8x"),
    new Problem("-5^3", [-15,-125, 45, 3], -125)
];

//números reales, expresion decimal de un numero real, racionalizacion
const NINETH_GRADE_PROBLEMS = [
    new Problem("7x + 2x", ["9x","5x","7x^2","9"], "9x"),
    new Problem("–33 + 97", [64,62,120,-64], 64),
    new Problem("4^4", [296,256,16,161], 296),
    new Problem("(2+2) (10*3) / 2", [17,12,44,22], 17),
    new Problem("(20+10)^2", [300, 210, 60, 80], 300),
    new Problem("2x . 4x", ["6x","6","8x","x^4"], "8x"),
    new Problem("-5^3", [-15,-125, 45, 3], -125)
];

//seno, coseno, tangente, angulos
const TENTH_GRADE_PROBLEMS = [
    new Problem("En un triángulo, los ángulos son: a = 90°, b = 27°, c = ?", ["63°","53°","65°","90°"], "63°"),
    new Problem("Para encontrar el seno de un angulo, es: ", ["O/H","A/H","O/A","tan"], "O/H"),
    new Problem("Para encontrar el coseno de un angulo, es: ", ["O/A","O/H","cos(a)","A/H"], "A/H"),
    new Problem("Para encontrar la tangente de un angulo, es: ", ["A/H","O/A","A/O","O/H"], "O/A"),
    new Problem("h^2 es igual a", ["a^2+b^2","a^2.b^2","a^2-b^2","h^2+(a+b)"], "a^2+b^2")
];

//intervalos, funcion cuadratica, logaritmica, exponencial, límite de una función
const ELEVENTH_GRADE_PROBLEMS = [
    new Problem("En un triángulo, los ángulos son: a = 90°, b = 27°, c = ?", ["63°","53°","65°","90°"], "63°"),
    new Problem("Para encontrar el seno de un angulo, es: ", ["O/H","A/H","O/A","tan"], "O/H"),
    new Problem("Para encontrar el coseno de un angulo, es: ", ["O/A","O/H","cos(a)","A/H"], "A/H"),
    new Problem("Para encontrar la tangente de un angulo, es: ", ["A/H","O/A","A/O","O/H"], "O/A"),
    new Problem("h^2 es igual a", ["a^2+b^2","a^2.b^2","a^2-b^2","h^2+(a+b)"], "a^2+b^2")
];

export let getRespectiveProblems = grade => {
    switch (grade) {
        case 8:
            return EIGHT_GRADE_PROBLEMS;
        case 9:
            return NINETH_GRADE_PROBLEMS;
        case 10:
            return TENTH_GRADE_PROBLEMS;
        case 11:
            return ELEVENTH_GRADE_PROBLEMS;
        default:
            break;
    }
}

export let getNmbOfProblems = function(lvl){
    if (lvl < 8) {
        return 5;
    } else if (lvl < 15) {
        return 6;
    } else if (lvl < 22) {
        return 8;
    } else if (lvl <= 25) {
        return 1;
    }
}
