<?php
require_once('cls_conexion.model.php');
class Clase_Asignaturas
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT asignaturas.ID_asignatura, asignatura.Nombre_asignatura, estudiante.Nombre as estudiante FROM `asignaturas` inner JOIN estudiantes on estudiantes.ID_estudiantes = asignaturas.ID_asignatura";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function uno($ID_asignatura)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `asignaturas` WHERE ID_asigantura=$ID_asignatura";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function insertar($Nombre_asignatura, $ID_estudiante, $Calificacion, $Fecha_examen)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `asignaturas`(`Nombre_asignatura`, ID_estudiante, `Calificacion`, `Fecha_examen`) VALUES ('$Nombre_asignatura', $ID_estudiante, '$Calificacion', '$Fecha_examen')";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($ID_asignatura, $ID_estudiante, $Nombre_asignatura, $Calificacion, $Fecha_examen)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `asignaturas` SET `Nombre Asignatura`='$Nombre_asignatura', `Calificación`='$Calificacion', `Fecha examen`='$Fecha_examen', ID_estudiante=$ID_estudiante WHERE `ID_asignatura`='$ID_asignatura'";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($ID_asignatura)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "delete from asignaturas where ID_asignatura=$ID_asignatura";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }



}
