<!doctype html>
<html lang="en">

    <head>
        <title>Pagina PHP</title>
        <!-- Required meta tags -->
        <meta charset= "utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <h1>Formulario Empleados</h1>
        <div
            class="container"
        >
            <form class="d-flex" action="crud_empleados.php" method="post" >
                <div class="col">
                <div class="mb-3">
                        <label for="lbl_id" class="form-label"><b>ID</b></label>
                        <input type="text" name="txt_id" id="txt_id" class="form-control" value="0" readonly/>
                    </div>
                    <div class="mb-3">
                        <label for="lbl_codigo" class="form-label"><b>Codigo</b></label>
                        <input type="text" name="txt_codigo" id="txt_codigo" class="form-control" placeholder="Codigo: E001" required/>
                    </div>
                    <div class="mb-3">
                        <label for="lbl_nombres" class="form-label"><b>Nombres</b></label>
                        <input type="text" name="txt_nombres" id="txt_nombres" class="form-control" placeholder="Ejemplo: Nombre1, Nombre2" required/>
                    </div>    
                    <div class="mb-3">
                        <label for="lbl_apellidos" class="form-label"><b>Apellidos</b></label>
                        <input type="text" name="txt_apellidos" id="txt_apellidos" class="form-control" placeholder="Ejemplo: Apellido1, Apellido2" required/>
                    </div>
                    <div class="mb-3">
                        <label for="lbl_direccion" class="form-label"><b>Direccion</b></label>
                        <input type="text" name="txt_direccion" id="txt_direccion" class="form-control" placeholder="Ejemplo: #Casa" required/>
                    </div> 
                    <div class="mb-3">
                        <label for="lbl_telefono" class="form-label"><b>Telefono</b></label>
                        <input type="text" name="txt_telefono" id="txt_telefono" class="form-control" placeholder="Ejemplo: 36890923" required/>
                    </div>
                    <div class="mg-3">
                        <label for="lbl_puesto" class="form-label"><b>Puesto</b></label>
                        <select class="form-select" name="drop_puesto" id="drop_puesto">   
                            <option value=0>--- Puesto ---</option>
                            <?php
                            include("datos_conexion.php");
                            $db_conexion = mysqli_connect($db_host, $db_usr, $db_pass, $db_nombre);
                            $db_conexion ->real_query("select id_puesto as id, puesto from puestos;");
                            $resultado = $db_conexion->use_result();
                            while($fila = $resultado->fetch_assoc()){
                                echo"<option value=". $fila['id'] .">". $fila['puesto'] ."</option>";
                            }                            
                            $db_conexion ->close();
                            ?>
                        </select>
                    </div>                       
                    <div class="mb-3">
                        <label for="lbl_fn" class="form-label"><b>Fecha Naciemiento</b></label>
                        <input type="date" name="txt_fn" id="txt_fn" class="form-control" placeholder="aaaa-mm-dd" required/>
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="btn_agregar" id="btn_agregar" class="btn btn-primary" value="Agregar" />
                        <input type="submit" name="btn_modificar" id="btn_modificar" class="btn btn-success" value="Modificar" />
                        <input type="submit" name="btn_eliminar" id="btn_eliminar" class="btn btn-danger" value="Eliminar" />
 
                    </div>
                </div>
            </form>
        
        <table class="table table-striped table-inverse table-responsive">
                    <thead class="table-inverse">
                        <tr>
                            <th>Codigo</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Puesto</th>
                            <th>Nacimiento</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_empleados">
                    <?php
                            include("datos_conexion.php");
                            $db_conexion = mysqli_connect($db_host, $db_usr, $db_pass, $db_nombre);
                            $db_conexion ->real_query("SELECT e.id_empleado as id,e.codigo,e.nombres,e.apellidos,e.direccion,e.telefono,p.puesto,e.fecha_nacimiento, e.id_puesto FROM empleados as e inner join puestos as p on e.id_puesto = p.id_puesto;");
                            $resultado = $db_conexion->use_result();
                            while($fila = $resultado->fetch_assoc()){
                                echo"<tr data-id=". $fila['id'] ." data-idp=". $fila['id_puesto'] .">";
                                echo"<td>". $fila['codigo'] ."</td>";
                                echo"<td>". $fila['nombres'] ."</td>";
                                echo"<td>". $fila['apellidos'] ."</td>";
                                echo"<td>". $fila['direccion'] ."</td>";
                                echo"<td>". $fila['telefono'] ."</td>";
                                echo"<td>". $fila['puesto'] ."</td>";
                                echo"<td>". $fila['fecha_nacimiento'] ."</td>";
                                echo"</tr>";
                            }                            
                            $db_conexion ->close();
                            ?>
                    </tbody>
                </table>  
            </div> 

        <!-- Bootstrap JavaScript Libraries -->
        <script 
            src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        <script>
            $("#tbl_empleados").on('click', 'tr td',function(e){
                var target,id,idp,codigo,nombres,apellidos,direccion,telefono,nacimiento;
                target = $(event.target);
                id = target.parent().data('id');
                idp = target.parent().data('idp');
                codigo = target.parent('tr').find("td").eq(0).html();
                nombres = target.parent('tr').find("td").eq(1).html();
                apellidos = target.parent('tr').find("td").eq(2).html();
                direccion = target.parent('tr').find("td").eq(3).html();
                telefono = target.parent('tr').find("td").eq(4).html();
                nacimiento = target.parent('tr').find("td").eq(6).html();
                $("#txt_id").val(id);
                $("#txt_codigo").val(codigo);
                $("#txt_nombres").val(nombres);
                $("#txt_apellidos").val(apellidos);
                $("#txt_direccion").val(direccion);
                $("#txt_telefono").val(telefono);
                $("#txt_fn").val(nacimiento);
                $("#drop_puesto").val(idp);
            });
        </script>
    </body>
</html>
