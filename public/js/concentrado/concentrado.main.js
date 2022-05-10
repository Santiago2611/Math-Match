import { levelObj } from "./levelBuilder.js";

var opPlace = document.getElementById("operacion"); //lugar de la operación
//las dos siguientes variables (ambas) son las respuestas
var answers = document.getElementsByName("answer");
var ansPlaces = {
    up: document.getElementById("upperAnswer"),
    left: document.getElementById("leftAnswer"),
    right: document.getElementById("rightAnswer"),
    down: document.getElementById("downAnswer"),
    all: [up,left,right,down]
};
var messageBox = document.getElementById("messageBox"); //campo de texto que dirá si acertó o no
var timebar = document.getElementById("timebar"); //barra que marca el tiempo
var timebarInterval; //intervalo de los frames de la barra de tiempo
var lifeHearts = document.getElementsByClassName("fa-heart");
var actualProblem; //problema actual (objeto con la operación y sus respuestas)
var problemMeter = document.getElementById("meter");

let showOutputMessage = function(str, strColor){ //muestra el mensaje, y se desvanece a los 3 segundos
    fadein(messageBox);
    messageBox.style.color = strColor;
    messageBox.innerHTML = str;
    fadeout(messageBox, 2500);
}

let timeover = function(){
    document.removeEventListener("keydown", getPressedArrow);
    console.log("c acabó el tiempo");
    showOutputMessage("Se acabó el tiempo...", "orange");

    substractLife();
    resetTimebar();
    next();
}

let setTime = function(){
    var barWidth = 100;
    timebarInterval = setInterval(() => {
        if (barWidth == 0) timeover();
        timebar.style.width = barWidth+"%";
        timebar.style.background = "hsl("+barWidth+", 64%, 44%)";
        barWidth--;
    }, 100);
}

let resetTimebar = function(){
    clearInterval(timebarInterval);
    timebar.style.opacity = "0";
    setTimeout(() => {
        timebar.style.width = "100%";
        timebar.style.background = "hsl(100, 64%, 44%)";
    }, 700);
}

let substractLife = function() {
    lifeHearts[levelObj.lives - 1].style.opacity = "0";
    lifeHearts[levelObj.lives - 1].style.color = "black";
    levelObj.lives--;
    console.log("lives: "+levelObj.lives);
}

let playerResult = function(success){
    if (success) {
        console.log("respuesta correcta");
        showOutputMessage("¡Acertaste!", "green");
    } else {
        console.log("perdiste :c");
        showOutputMessage("Respuesta equivocada...", "red");
        substractLife();
    }

    next();
}

//método que imprime la operacion + respuestas, y activa el listener
let printOpWithAnswers = function(){
    problemMeter.innerHTML = (levelObj.actualIndex + 1) + "/" + levelObj.nmbOfProblems;
    timebar.style.opacity = "1";
    setTimeout(function() {
        setTime();
        document.addEventListener("keydown", getPressedArrow); //lo más importante, el listener del teclado, sin esto el juego no funcionaría.
    }, 1500);
    actualProblem = levelObj.problems[levelObj.order[levelObj.actualIndex]];

    opPlace.innerHTML = actualProblem.operation;
    ansPlaces.up.innerHTML = actualProblem.answers[0];
    ansPlaces.right.innerHTML = actualProblem.answers[1];
    ansPlaces.down.innerHTML = actualProblem.answers[2];
    ansPlaces.left.innerHTML = actualProblem.answers[3];

    fadein(opPlace);
    fadein(ansPlaces.up, 1000);
    fadein(ansPlaces.right, 1200);
    fadein(ansPlaces.down, 1400);
    fadein(ansPlaces.left, 1600);
}

let animation = function(arr, answer){
    var arrow = document.getElementById(arr);
    arrow.style.color = (answer) ? "green" : "red";
    arrow.style.transition = "none";
    setTimeout(function(){
        arrow.style.color = "rgb(40,40,40)";
        arrow.style.transition = "1s ease";
    }, 500);
}

let getIfRightAnswer = function(ans){
    if (ans.innerHTML == actualProblem.rightAnswer){
        return true;
    } else {
        return false;
    }
}

let finishGame = function(){
    fadeout(opPlace);

    setTimeout(function(){
        opPlace.innerHTML = "Juego terminado, vaya tome awita :D";
        fadein(opPlace);
    }, 1500);
}

let next = function(){
    fadeout(opPlace, 2800);
    for (let i = 0; i < answers.length; i++) {
        fadeout(answers[i], 2800);
    }

    levelObj.actualIndex++;
    //si hay un siguiente problema, y el usuario tiene vidas, entonces sigue
    setTimeout(function(){
        (levelObj.actualIndex < levelObj.nmbOfProblems
            && levelObj.lives > 0) ? printOpWithAnswers() : finishGame();
    }, 3500);
}

let getPressedArrow = (e) => { //método que se ejecutará con el listener

    var selectedArr = undefined;
    var arrow;
    var accert; //booleana de si acertó

    switch (e.keyCode) {
        case 37:
            selectedArr = ansPlaces.left;
            arrow = "left";
            break;
        case 38:
            selectedArr = ansPlaces.up;
            arrow = "up";
            break;
        case 39:
            selectedArr = ansPlaces.right;
            arrow = "right";
            break;
        case 40:
            selectedArr = ansPlaces.down;
            arrow = "down";
            break;
        default:
            break;
    }

    /* si se presionó una tecla inválida, la variable selectedArr quedará como undefined,
    por lo tanto, no entrará al siguiente algoritmo */
    if (selectedArr != undefined) {
        document.removeEventListener("keydown", getPressedArrow);
        resetTimebar();
        accert = getIfRightAnswer(selectedArr);
        playerResult(accert);
    }

    try {
        animation(arrow, accert);
    } catch(e) {
        console.log("presionaste una tecla no válida");
    };

}

let start = (e) => { //empezar el juego
    if (e.keyCode == 13) {
        document.removeEventListener("keydown", start);
        fadeout(opPlace);
        setTimeout(printOpWithAnswers, 2000);
    }
}

let fadeout = function(obj, delay = 0){
    setTimeout(function(){
        obj.style.transition = "0.5s linear";
        obj.style.opacity = "0";
    }, delay);
}

let fadein = function(obj, delay = 0){
    setTimeout(function(){
        obj.style.transition = "1s linear";
        obj.style.opacity = "1";
    }, delay);
}

document.addEventListener("keydown", start);
