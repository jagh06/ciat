
<div class="modalemp" id="editemp<?php echo $id;?>" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
            <div class="modal-content">
           
               <?php
               require_once("../conexion.php");
               $result=mysqli_query($conection,"SELECT * FROM empleados where id_emp='$id'");
               $consulta = mysqli_fetch_array($result);
               ?>
            </div>
            <div class="formedit">
                <form method="post" action="guardarcambioemp.php" >
                <input type="hidden" class="form-control" name="id_emp" id="id_emp" value="<?php echo $consulta['id_emp'];?>">
                    <div class="modal-body" id="cont_modal">
                        <div class="form-group">
                            <label for="recipient-name" class="labeledit" align="right">Nombre<input class="inputedit" type="text" name="nombre" id="nombre" placeholder="Ingresar Nombre" value="<?php echo $consulta['nombre'];?>" required autofocus></label>
                            <label class="labeledit" align="right">Fecha de Nacimiento<input class="inputedit" type="date" name="fecha_nac" id="fecha_nac" placeholder="Ingresar Fecha de Nacimiento" value="<?php echo $consulta['fecha_nac'];?>" autofocus required></label>
                            <label class="labeledit" align="right">Domicilio<input class="inputedit" type="text" name="domicilio" id="domicilio" placeholder="Ingresar Domicilio" value="<?php echo $consulta['domicilio'];?>"required></label>
                            <label class="labeledit" align="right">Telefono<input class="inputedit" type="number" name="telefono" id="telefono" placeholder="Ingresar Telefono" value="<?php echo $consulta['telefono'];?>" required></label>
                            <label class="labeledit" align="right">Correo Electronico<input class="inputedit" type="email" name="correo_electronico" id="correo_electronico" placeholder="Ingresar Correo Electronico" value="<?php echo $consulta['correo_electronico'];?>"required></label>
                            <label class="labeledit" align="right">Salario<input class="inputedit"  type="number" name="salario" id="salario" placeholder="Ingresar Salario" value="<?php echo $consulta['salario'];?>" required></label>       
                            <label class="labeledit"  align="right">Cargo<input class="inputedit" type="text" name="cargo_empresa" id="cargo_empresa" placeholder="Ingresar Cargo" value="<?php echo $consulta['cargo_empresa'];?>"required></label>
                        </div>
                    </div>
                    <div class="accion-saveedit">
                        <input class="inputsaveedit" type="submit" value="Actualizar"> 
                    </div>
                </form>
            <div>

            </div>
</div>
</div>

