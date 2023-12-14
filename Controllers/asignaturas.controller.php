<?php
require_once('../Models/cls_asignaturas.model.php');
$asignaturas = new Clase_Asignaturas;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $asignaturas->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
    case "uno":
        $ID_asignatura = $_POST["ID_asignatura"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $asignaturas->uno($ID_asignatura); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
        $ID_estudiante = $_POST["ID_estudiante"];
        $Nombre_asignatura = $_POST["Nombre_asignatura"];
        $ID_asignatura = $_POST["ID_asignatura"];
        $Calificacion = $_POST["Calificacion"];
        $Fecha_examen = $_POST["Fecha_examen"];
        $datos = array(); //defino un arreglo
        $datos = $asignaturas->insertar($Nombre_asignatura, $ID_asignatura, $Calificacion, $Fecha_examen); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $ProvinciasId = $_POST["ProvinciasId"];
        $PaisId = $_POST["PaisId"];
        $Nombre = $_POST["Nombre"];
        
        $datos = array(); //defino un arreglo
        $datos = $provincias->actualizar($ProvinciasId, $PaisId, $Nombre); //llamo al modelo de usuarios e invoco al procedimiento actual
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'eliminar':
        $ProvinciasId = $_POST["ProvinciasId"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $provincias->eliminar($ProvinciasId); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
}
