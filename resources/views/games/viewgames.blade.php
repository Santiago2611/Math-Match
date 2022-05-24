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
            display: flex;
            align-items: center;
            margin-top: 10px;
            padding: 8px;
        }

        .game * {
            margin-right: 10%;
            font-size: 1.2em;
        }

        .progress {
            white-space: nowrap;
            margin: 0px;
        }

        button {
            padding: 8px;
            border-radius: 5px;
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
            <button type="button" style="background: #EBAF61">Instrucciones</button>
            <button type="button" style="background: #34c047">Jugar</button>
            <div class="progress">
                <p>Progreso: <span id="progress">0%</span></p>
            </div>
        </div>
    </div>

</x-app-layout>
