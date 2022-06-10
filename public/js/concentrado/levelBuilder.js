//aquí se construye el nivel que jugará el usuario, dependiendo del grado y el nivel en el que va

import { Level } from "./Level.js";
import { getNmbOfProblems, getRespectiveProblems } from "./problems.js";

var playerGrade = parseInt(document.getElementById("grade").value);
var playerActualLevel = document.getElementById("level").value;
var problems = getRespectiveProblems(playerGrade);
var nmbOfProblems = getNmbOfProblems(playerActualLevel);

export const levelObj = new Level(problems, nmbOfProblems, playerGrade, playerActualLevel);
