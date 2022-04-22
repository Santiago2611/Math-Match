var opPlace = document.getElementById("operacion"); //lugar de la operación
var ansPlace = document.getElementsByName("ans"); //lugar de las respuestas
var order; //orden aleatorio en el que saldrán las operaciones
var opIndex = 0; //índice de la operación actual
var messageBox = document.getElementById("messageBox"); //campo de texto que dirá si acertó o no
var timebar = document.getElementById("timebar"); //barra que marca el tiempo
var timeout; //tiempo para responder

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

let timeover = function(){
    document.removeEventListener("keydown", getPressedArrow);
    console.log("c acabó el tiempo");
    messageBox.style.color = "orange";
    messageBox.innerHTML = "Se acabó el tiempo...";
    
    resetTimebar();
    next();
}

let setTime = function(){
    fadein(timebar);
    timebar.style.transition = "all 10s linear";
    timebar.style.background = "orange";
    timebar.style.width = "0%";
    timeout = setTimeout(function(){
        timeover();
    }, 10000);
    console.log("time set");
}

let getRandomOrder = function(){
    let order = [], indexToPush = 0;
    let len = operations.length;
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

let getUserAction = function(success){ 

    if (success) {
        console.log("respuesta correcta");
        messageBox.innerHTML = "¡Acertaste!";
        messageBox.style.color = "green";
    } else {
        console.log("perdiste :c");
        messageBox.style.color = "red";
        messageBox.innerHTML = "Respuesta equivocada...";
    }
    
    resetTimebar();
    next();
}

//método que imprime la operacion + respuestas, y activa el listener
let printOpWithAnswers = function(){ 
    document.addEventListener("keydown", getPressedArrow); //lo más importante, el listener del teclado, sin esto el juego no funcionaría.
    console.log("listener añadido");
    setTime();

    opPlace.innerHTML = operations[order[opIndex]][0];
    for (let i = 0; i < 4; i++) {
        ansPlace[i].innerHTML = answers[order[opIndex]][i];
    }
    
    fadein(opPlace, 500);
    ansPlace.forEach(element => {
        fadein(element);
    });
    console.log(timebar.style.transition);
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
    if (ans == operations[order[opIndex]][1]){
        return true;
    } else {
        return false;
    }
}

let next = function(){
    fadeout(messageBox, 2000);
    fadeout(opPlace, 2500);
    ansPlace.forEach(element => {
        fadeout(element, 2500);
    });
    
    opIndex++;
    (opIndex < operations.length) ? setTimeout(printOpWithAnswers, 3000) : alert("terminaste");
}

let resetTimebar = function(){
    fadeout(timebar);
    setTimeout(function(){
        timebar.style.transition = "all 0.2s linear";
        timebar.style.background = "green";
        timebar.style.width = "100%";
    }, 1000);
}

let getPressedArrow = (e) => { //método que se ejecutará con el listener
    clearTimeout(timeout);

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
    console.log("<<<FADE IN EJECUTADO>>>");
}

document.addEventListener("keydown", start);