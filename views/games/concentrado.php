<?php include "../../layouts/Layouts.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php Layouts::head("Concentrado","../../css/styles.css"); ?>

    <style>
        .container-xl {
            position: relative;
            background-color: lightblue;
            height: 800px;
            border: dashed black 2px;
            margin-top: 20px;
            padding: 0;
        }

        .sub-container {
            position: absolute;
            background-color: red;
            width: 100%;
            height: 50%;
            margin: auto;
            bottom: 0px;
            text-align: center;
        }

        .pad {
            position: relative;
            background-color: gray;
            font-size: 3em;
            width: 50%;
            height: 100%;
            margin: auto;
        }

        .arrows {
            background: lightgray;
            position: relative;
            font-size: 2em;
            text-align: center;
            padding: 0px;
        }

        .arrows .fa-caret-up {
            position: absolute;
            top: 0px;
        }

        .arrows .fa-caret-right {
            position: absolute;
            right: 0px;
        }

        .arrows .fa-caret-down {
            position: absolute;
            bottom: 0px;
        }

        .arrows .fa-caret-left {
            float: left;
        }

        .operationBox {
            position: relative;
            background: white;
            text-align: center;
            top: 100px;
        }

        #operacion {
            font-size: 5em;
        }

        #messageBox {
            position:relative;
            top: 100px;
            text-align: center;
        }

    </style>
</head>
<body>
    
    <div class="container-xl">
        <div>
            <a href=""><i class="">volver</i></a>
        </div>
        <div class="operationBox">
            <h2 id="operacion">operacion</h2>
        </div>
        <h3 id="messageBox"></h3> <!-- comienza con el innerHTML vacío-->
        <div class="sub-container">
            <table class="pad">
                <tr>
                    <td></td>
                    <td name="ans">op1</td>
                    <td></td>
                </tr>
                <tr>
                    <td name="ans">op2</td>
                    <td class="arrows">
                        <i class="fas fa-caret-up" id="up"></i>
                        <i class="fas fa-caret-right" id="right"></i>
                        <i class="fas fa-caret-down" id="down"></i>
                        <i class="fas fa-caret-left" id="left"></i>
                    </td>
                    <td name="ans">op3</td>
                </tr>
                <tr>
                    <td></td>
                    <td name="ans">op4</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>

    <script src="../../js/script_conc.js"></script>
    
</body>
</html>