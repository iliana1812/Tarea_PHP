<?php
if(!empty($_POST)){
    $txt_id = $_POST["txt_id"];
    $txt_codigo = $_POST["txt_codigo"];
    $txt_nombres = $_POST["txt_nombres"];
    $txt_apellidos = $_POST["txt_apellidos"];
    $txt_direccion = $_POST["txt_direccion"];
    $txt_telefono = $_POST["txt_telefono"];
    $drop_puesto = $_POST["drop_puesto"];
    $txt_fn = $_POST["txt_fn"];

    $sql ="";

    if (isset($_POST["btn_agregar"])){
        $sql = "INSERT INTO empleados(codigo, nombres, apellidos, direccion, telefono, id_puesto, fecha_nacimiento) VALUES('".$txt_codigo."','".$txt_nombres."','".$txt_apellidos."','".$txt_direccion."','".$txt_telefono."',".$drop_puesto.",'".$txt_fn."');";
     }
     if (isset($_POST["btn_modificar"])){
        $sql = "UPDATE empleados SET codigo='".$txt_codigo."',nombres='".$txt_nombres."',apellidos='".$txt_apellidos."',direccion='".$txt_direccion."',telefono='".$txt_telefono."',id_puesto=".$drop_puesto.",fecha_nacimiento='".$txt_fn."' where id_empleado=".$txt_id.";";
     }
     if (isset($_POST["btn_eliminar"])){
        $sql = "DELETE FROM empleados where id_empleado=".$txt_id.";";
        }
        
        include("datos_conexion.php");
            $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);

                if($db_conexion->query($sql)==true){
                header("Location: /empresa1_php");
                $db_conexion ->close();
                
            }else{
                echo"Error" . $sql ."<br>". $db_conexion ->close();
            }
        
}
 
?>   