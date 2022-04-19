const operations = [
    "22 + 6",
    "12 - 4",
    "80 / 4",
    "15 + 2",
    "15 + 5 - 4"
];

const answers = [
    [28,29,23,24],
    [12,8,11,9],
    [20,19,10,30],
    [14,16,17,18],
    [12,19,21,20]
];


let getRandomOp = function(){
    var rand = Math.floor(Math.random() * 5);
    return rand;
}

let printOpWithAnswers = function(){
    var opPlace = document.getElementById("operacion");
    var ansPlace = document.getElementsByName("ans");
    var randomOp = getRandomOp();
    opPlace.innerHTML = operations[randomOp];
    for (let i = 0; i < 4; i++) {
        ansPlace[i].innerHTML = answers[randomOp][i];
    }
    console.log("showing answers of operation "+opPlace.innerHTML);
}

let animation = function(arr){
    var arrows = document.getElementsByName("arrow");
    arrows[arr].style.color = "green";
    setTimeout(function(){
        arrows[arr].style.color = "black";
    }, 500);
}

let getPressedArrow = (e) => {
    var infoBox = document.getElementsByClassName("operationBox")[0];

    switch (e.keyCode) {
        case 37:
            infoBox.innerHTML = "izquierda";
            animation(3);
            break;
        case 38:
            infoBox.innerHTML = "arriba";
            animation(0);
            break;
        case 39:
            infoBox.innerHTML = "derecha";
            animation(1);
            break;
        case 40:
            infoBox.innerHTML = "abajo";
            animation(2);
            break;
        default:
            break;
    }
}

document.addEventListener("keydown", getPressedArrow);