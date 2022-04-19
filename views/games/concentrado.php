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

        @keyframes easeAnim {
            0% {
                color: green;
            }

            25% {
                color: green;
            }

            100% {
                color: black;
            }
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
                        <i class="fas fa-caret-up" name="arrow"></i>
                        <i class="fas fa-caret-right" name="arrow"></i>
                        <i class="fas fa-caret-down" name="arrow"></i>
                        <i class="fas fa-caret-left" name="arrow"></i>
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