<?php
require_once('../Models/cls_estudiantes.models.php');
$estudiante = new Clase_Estudiantes;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $estudiante->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
    case "uno":
        $ID_estudiante = $_POST["ID_estudiante"]; //defino una variable para almacenar el id del estudiante, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $estudiante->uno($ID_estudiante); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
        $Nombre = $_POST["Nombre"];
        $Edad = $_POST["Edad"];
        $Carrera = $_POST["Carrera"];
        $Promedio = $_POST["Promedio"];
        $datos = array(); //defino un arreglo
        $datos = $estudiante->insertar($Nombre, $Edad, $Carrera, $Promedio); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $ID_estudiante = $_POST["ID_estudiante"];
        $Nombre = $_POST["Nombre"];
        $Edad = $_POST["Edad"];
        $Carrera = $_POST["Carrera"];
        $Promedio = $_POST["Promedio"];
        
        $datos = array(); //defino un arreglo
        $datos = $estudiante->actualizar($ID_estudiante, $Nombre, $Edad, $Carrera, $Promedio); //llamo al modelo de usuarios e invoco al procedimiento actual
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'eliminar':
        $ID_estudiante = $_POST["$ID_estudiante"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $estudiante->eliminar($ID_estudiante); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
}
