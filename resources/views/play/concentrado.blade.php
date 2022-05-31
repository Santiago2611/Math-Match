@extends("layouts.plantilla_juego")
@section("title","Juego Concentrado")
@section("content")

<style>
    .container-xl {
        position: relative;
        background-color: lightgray;
        height: 800px;
        border: dashed black 2px;
        margin-top: 20px;
        padding: 0;
    }

    .sub-container {
        position: absolute;
        width: 100%;
        height: 50%;
        margin: auto;
        bottom: 0px;
        text-align: center;
    }

    .header {
        position: relative;
        background: whitesmoke;
        width: 100%;
        height: 80px;
    }

    .stage-box {
        position: relative;
        width: 100%;
        font-size: 2.5em;
        text-align: center;
    }

    .pad {
        position: relative;
        font-size: 3em;
        width: 50%;
        height: 100%;
        margin: auto;
    }

    .arrows {
        position: relative;
        background: lightgray;
        font-size: 2em;
        height: 40%;
        padding: 0px;
    }

    .fa-arrow-left {
        position: relative;
        font-size: 4em;
        color: gray;
        margin: 5px;
        padding: 5px;
        transition: 0.5s ease;
    }

    .fa-arrow-left:hover {
        color: black;
        font-size: 4.5em;
    }

    .lives {
        position: absolute;
        right: 0px;
        display: inline-block;
        padding: 10px;
    }

    .fa-heart {
        position: relative;
        transition: 0.8s;
        color: crimson;
        font-size: 3em;
        margin: 5px;
    }

    .arrows .fa-caret-up {
        position: absolute;
        top: -20px;
        left: 0px;
        width: 100%;
    }

    .arrows .fa-caret-right {
        position: absolute;
        height: 100%;
        top: 0px;
        right: 0px;
    }

    .arrows .fa-caret-down {
        position: absolute;
        bottom: -20px;
        left: 0px;
        width: 100%;
    }

    .arrows .fa-caret-left {
        position: absolute;
        height: 100%;
        top: 0px;
        left: 0px;
    }

    .operationBox {
        position: relative;
        background: white;
        box-shadow: 0px 5px 10px black;
        text-align: center;
    }

    #operacion {
        font-size: 5em;
    }

    #messageBox {
        position: relative;
        top: 10px;
        text-align: center;
        color: transparent;
        transition: color 0.5s ease;
    }

    .timebar {
        position: absolute;
        bottom: 0px;
        background: green;
        width: 100%;
        height: 20px;
        opacity: 0;
    }

</style>

<input type="hidden" id="level" value="<?php echo $level ?>">
<div class="container-xl">
    <div class="header">
        <a href="{{route('games')}}"><i class="fas fa-arrow-left"></i></a>
        <div class="lives">
            <i class="fas fa-heart"></i>
            <i class="fas fa-heart"></i>
            <i class="fas fa-heart"></i>
        </div>
    </div>
    <div class="stage-box">
        <div class="sub-stage-box">
            <b>Nivel {{$level}}</b>
            <p id="meter">-/-</p>
        </div>
    </div>

    <div class="operationBox">
        <h2 id="operacion">Presiona ENTER para comenzar</h2>
    </div>
    <h3 id="messageBox"></h3> <!-- comienza con el innerHTML vacío-->
    <div class="sub-container">
        <table class="pad">
            <tr>
                <td></td>
                <td id="upperAnswer" name="answer"></td>
                <td></td>
            </tr>
            <tr>
                <td id="leftAnswer" name="answer"></td>
                <td class="arrows">
                    <i class="fas fa-caret-up" id="up"></i>
                    <i class="fas fa-caret-right" id="right"></i>
                    <i class="fas fa-caret-down" id="down"></i>
                    <i class="fas fa-caret-left" id="left"></i>
                </td>
                <td id="rightAnswer" name="answer"></td>
            </tr>
            <tr>
                <td></td>
                <td id="downAnswer" name="answer"></td>
                <td></td>
            </tr>
        </table>
    </div>
    <div class="timebar" id="timebar"></div>
</div>

<script type="module" src="../../js/concentrado/concentrado.main.js"></script>

@endsection
