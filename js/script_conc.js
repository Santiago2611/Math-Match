const operations = [
    ["22 + 6","up"], //operación, dirección de la respuesta correcta
    ["12 - 4","left"],
    ["80 / 4","up"],
    ["15 + 2","right"],
    ["15 + 5 - 4","down"]
];

const answers = [
    [28,29,23,24], //IMPORTANTE: el orden en el que se imprimen es, respectivamente: --arriba--, --izquierda--, --derecha--, --abajo--
    [12,8,11,9],
    [20,19,10,30],
    [14,16,17,18],
    [12,19,21,16]
];

var operationIndex; //índice de la operación actual

let getRandomOp = function(){
    var rand = Math.floor(Math.random() * 5);
    return rand;
}

let printOpWithAnswers = function(){
    document.addEventListener("keydown", getPressedArrow); //lo más importante, es el listener del teclado, sin esto el juego no funcionaría.

    var opPlace = document.getElementById("operacion");
    var ansPlace = document.getElementsByName("ans");
    var randomOp = getRandomOp();
    opPlace.innerHTML = operations[randomOp][0];
    for (let i = 0; i < 4; i++) {
        ansPlace[i].innerHTML = answers[randomOp][i];
    }
    operationIndex = randomOp;
    console.log("showing answers of operation "+opPlace.innerHTML);
}

let animation = function(arr, color){
    var selectedArrow = document.getElementById(arr);
    selectedArrow.style.color = color;
    selectedArrow.style.transition = "none";
    setTimeout(function(){
        selectedArrow.style.color = "black";
        selectedArrow.style.transition = "1s ease";
    }, 500);
}

let getIfRightAnswer = function(ans){
    if (ans == operations[operationIndex][1]){
        return true;
    } else {
        return false;
    }
}

let getPressedArrow = (e) => {
    var infoBox = document.getElementsByClassName("operationBox")[0];
    var selectedArr = undefined;

    switch (e.keyCode) {
        case 37:
            selectedArr = "left";
            break;
        case 38:
            selectedArr = "up";
            break;
        case 39:
            selectedArr = "right";
            break;
        case 40:
            selectedArr = "down";
            break;
        default:
            break;
    }
            
    var accert = getIfRightAnswer(selectedArr);
    var color;
    var messageBox = document.getElementById("messageBox");

    if (accert) {
        document.removeEventListener("keydown", getPressedArrow);
        console.log("respuesta correcta");
        color = "green";
        messageBox.innerHTML = "¡Acertaste!";
    } else {
        if (selectedArr != undefined) {
            document.removeEventListener("keydown", getPressedArrow);
            console.log("respuesta incorrecta :c");
            color = "red";
            messageBox.innerHTML = "Respuesta equivocada...";
        }
    }

    setTimeout(function(){
        messageBox.innerHTML = "";
        setTimeout(function(){
            printOpWithAnswers();
        }, 1000)
    }, 1000);

    try {
        animation(selectedArr, color);
    } catch(e) {
        console.log("presionaste una tecla no válida");
    };
    
}

printOpWithAnswers();