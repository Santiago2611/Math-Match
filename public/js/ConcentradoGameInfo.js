export class ConcentradoGameInfo {

    lives = 3;

    operations = [
        ["22 + 6","up"], //operación, dirección de la respuesta correcta
        ["12 - 4","left"],
        ["80 / 4","up"],
        ["15 + 2","right"],
        ["15 + 5 - 4","down"]
    ];

    answers = [
        [28,29,23,24], //IMPORTANTE: el orden en el que se imprimen es, respectivamente: --arriba--, --izquierda--, --derecha--, --abajo--
        [12,8,11,9],
        [20,19,10,30],
        [14,16,17,18],
        [12,19,21,16]
    ];

}
