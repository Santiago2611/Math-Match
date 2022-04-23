<?php include "../../layouts/Layouts.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php Layouts::head("Concentrado","../../css/styles.css"); ?>

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
            position: absolute;
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
            top: 180px;
        }

        #operacion {
            font-size: 5em;
        }

        #messageBox {
            position: relative;
            top: 100px;
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
</head>
<body>
    
    <div class="container-xl">
        <div>
            <a href=""><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="operationBox">
            <h2 id="operacion">Presiona ENTER para comenzar</h2>
        </div>
        <h3 id="messageBox"></h3> <!-- comienza con el innerHTML vacío-->
        <div class="sub-container">
            <table class="pad">
                <tr>
                    <td></td>
                    <td name="ans">...</td>
                    <td></td>
                </tr>
                <tr>
                    <td name="ans">...</td>
                    <td class="arrows">
                        <i class="fas fa-caret-up" id="up"></i>
                        <i class="fas fa-caret-right" id="right"></i>
                        <i class="fas fa-caret-down" id="down"></i>
                        <i class="fas fa-caret-left" id="left"></i>
                    </td>
                    <td name="ans">...</td>
                </tr>
                <tr>
                    <td></td>
                    <td name="ans">...</td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="timebar" id="timebar"></div>
    </div>

    <script src="../../js/script_conc.js"></script>
    
</body>
</html>