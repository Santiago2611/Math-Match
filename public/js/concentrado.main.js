import { ConcentradoGameInfo } from "./ConcentradoGameInfo.js";

var opPlace = document.getElementById("operacion"); //lugar de la operación
var ansPlace = document.getElementsByName("ans"); //lugar de las respuestas
var order; //orden aleatorio en el que saldrán las operaciones
var opIndex = 0; //índice de la operación actual
var messageBox = document.getElementById("messageBox"); //campo de texto que dirá si acertó o no
var timebar = document.getElementById("timebar"); //barra que marca el tiempo
var timeout; //tiempo para responder
var lifeHearts = document.getElementsByClassName("fa-heart");

const gameinfo = new ConcentradoGameInfo();

let showOutputMessage = function(str, strColor){ //muestra el mensaje, y se desvanece a los 3 segundos
    fadein(messageBox);
    messageBox.style.color = strColor;
    messageBox.innerHTML = str;
    fadeout(messageBox, 3000);
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
    fadein(timebar, 100); //se le pone un delay de 100 a modo de debugging
    timebar.style.transition = "all 10s linear";
    timebar.style.background = "orange";
    timebar.style.width = "0%";
    timeout = setTimeout(function(){
        timeover();
    }, 10000);
}

let getRandomOrder = function(){
    let order = [], indexToPush = 0;
    let len = gameinfo.operations.length;
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

let substractLife = function() {
    lifeHearts[gameinfo.lives - 1].style.opacity = "0";
    lifeHearts[gameinfo.lives - 1].style.color = "black";
    gameinfo.lives--;
    if (gameinfo.lives == 0) alert("te quedaste sin vidas :c");
    console.log("lives: "+gameinfo.lives);
}

let getUserAction = function(success){
    if (success) {
        console.log("respuesta correcta");
        showOutputMessage("¡Acertaste!", "green");
    } else {
        console.log("perdiste :c");
        showOutputMessage("Respuesta equivocada...", "red");
        substractLife();
    }

    resetTimebar();
    next();
}

//método que imprime la operacion + respuestas, y activa el listener
let printOpWithAnswers = function(){
    setTime();
    document.addEventListener("keydown", getPressedArrow); //lo más importante, el listener del teclado, sin esto el juego no funcionaría.

    opPlace.innerHTML = gameinfo.operations[order[opIndex]][0];
    for (let i = 0; i < 4; i++) {
        ansPlace[i].innerHTML = gameinfo.answers[order[opIndex]][i];
    }

    fadein(opPlace);
    ansPlace.forEach(element => {
        fadein(element, 1000);
    });
}

let animation = function(arr, answer){
    var selectedArrow = document.getElementById(arr);
    selectedArrow.style.color = (answer) ? "green" : "red";
    selectedArrow.style.transition = "none";
    setTimeout(function(){
        selectedArrow.style.color = "rgb(40,40,40)";
        selectedArrow.style.transition = "1s ease";
    }, 500);
}

let getIfRightAnswer = function(ans){
    if (ans == gameinfo.operations[order[opIndex]][1]){
        return true;
    } else {
        return false;
    }
}

let next = function(){
    fadeout(opPlace, 2500);
    ansPlace.forEach(element => {
        fadeout(element, 2500);
    });

    opIndex++;
    (opIndex < gameinfo.operations.length) ? setTimeout(printOpWithAnswers, 3000) : alert("terminaste");
}

let resetTimebar = function(){
    fadeout(timebar);
    setTimeout(function(){
        timebar.style.transition = "all 0s linear";
        timebar.style.background = "green";
        timebar.style.width = "100%";
    }, 1000);
}

let getPressedArrow = (e) => { //método que se ejecutará con el listener

    var selectedArr = undefined;
    var accert; //booleana de si acertó

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

    /* si se presionó una tecla inválida, la variable selectedArr quedará como undefined,
    por lo tanto, no entrará al siguiente algoritmo */
    if (selectedArr != undefined) {
        clearTimeout(timeout);
        document.removeEventListener("keydown", getPressedArrow);
        accert = getIfRightAnswer(selectedArr);
        getUserAction(accert);
    }

    try {
        animation(selectedArr, accert);
    } catch(e) {
        console.log("presionaste una tecla no válida");
    };

}

let start = (e) => { //empezar el juego
    if (e.keyCode == 13) {
        document.removeEventListener("keydown", start);
        fadeout(opPlace);
        setTimeout(printOpWithAnswers, 2000);
        order = getRandomOrder();
    }
    console.log("orden: "+order);
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
