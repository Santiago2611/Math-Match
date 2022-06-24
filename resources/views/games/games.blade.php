<x-app-layout>
    <style>
        .container {
            margin-top: 10px;
        }

        .header h1 {
            font-size: 2em;
            font-weight: bold;
            color: gray;
        }

        .game {
            background: lightgray;
            align-items: center;
            margin-top: 10px;
            padding: 8px;
            border-radius: 3px;
            border-bottom: 3px solid #999;
        }

        .game * {
            margin-right: 6%;
            font-size: 1.2em;
            display: inline;
        }

        .progress {
            white-space: nowrap;
            background: none;
            margin: 0px;
        }

        button {
            white-space: nowrap;
            padding: 8px;
            border-radius: 5px;
        }

        button a {
            color: black;
        }

        #instructions {
            color: gray;
            margin-top: 10px;
            display: none;
        }
    </style>

    <div class="container">
        <div class="header">
            <h1>Estos son los juegos que tenemos para tí</h1>
        </div><hr>
        <div class="game">
            <div>
                <p style="font-weight: bold; font-size: 1.5em;">Concentrado</p>
            </div>
            <button type="button" style="background: #EBAF61" onclick="showInstructions(0);">
                Instrucciones <i id="i" class="fas fa-chevron-down" style="font-size: 0.7em;"></i></button>
            @if ($progresses["concentrado"] <= 25)
                <button type="button" style="background: #3491c0">
                    <a href="{{ ($progresses['concentrado'] == null) ? url('comenzar/concentrado') : route('concentrado') }}">
                        Jugar
                    </a>
                </button>
            @else
                <button type="button" style="background: gray" disabled>Terminaste</button>
            @endif
            <div class="progress">
                <p>
                    @if ($progresses["concentrado"] == null)
                        Aún no has empezado a jugar
                    @elseif ($progresses["concentrado"] <= 25)
                        Progreso: nivel {{$progresses["concentrado"]}}
                    @else
                        Juego terminado <i class="fa-solid fa-medal"></i>
                    @endif
                </p>
            </div><br>
            <p id="instructions">En este juego, los únicos controles son las flechas de dirección del teclado (arriba,
                abajo, izquierda, derecha). Aparecerá un problema en el "tablero", y cuatro respuestas, donde debes
                seleccionar la que consideres que es correcta con las flechas del teclado, que es la dirección donde
                está la respuesta. ¡Sencillo y divertido!.
            </p>
        </div>
    </div>

    <script>
        let showInstructions = target => {
            var gameInstructions = document.getElementsByClassName("game")[target].lastElementChild; //<p> de las instrucciones
            var icon = document.getElementById("i");
            var isShown = gameInstructions.style.display == "block";
            gameInstructions.style.display = (isShown) ? "none" : "block";
            icon.setAttribute("class", (isShown) ? "fas fa-chevron-down" : "fas fa-chevron-up");
        }
    </script>

</x-app-layout>
