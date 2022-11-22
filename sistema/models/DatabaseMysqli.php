<?php
 class DatabaseMysqli{
    public static function conexion(){
        $conexion=new mysqli("localhost", "root", "", "actividadlaboratoriog5");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}
?>
