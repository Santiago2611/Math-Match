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

const EIGHT_GRADE_PROBLEMS = [
    new Problem("15 + 16", [23,29,31,30], 23),
    new Problem("40 / 4", [10,20,10,30], 10),
    new Problem("responder 1", [1,3,0,4], 1),
    new Problem("25 * 5 - 4", [121,125,25,44], 121),
    new Problem("responder 5", [5,12,4,3], 5),
    new Problem("responder 60", [12,50,51,60], 60),
    new Problem("responder 32", [40,32,23,233], 32),
    new Problem("responder 60", [12,50,51,60], 60),
    new Problem("responder 65", [12,50,51,65], 65),
    new Problem("responder 1212", [12,1212,51,60], 1212),
    new Problem("responder 54", [12,50,54,60], 54),
    new Problem("responder 9", [12,50,9,60], 9)
];

const NINETH_GRADE_PROBLEMS = [];
const TENTH_GRADE_PROBLEMS = [];
const ELEVENTH_GRADE_PROBLEMS = [];

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
        return 10;
    }
}
