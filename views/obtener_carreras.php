<?php
require_once "../conexion.php";
$id = $_POST['universidad'];

// $sql = "SELECT  CAST(carreras.nombre_carrera AS CHAR) AS nombre_carrera 
//     FROM carreras
//     JOIN universidad_carreras ON carreras.id = universidad_carreras.id_carrera
//     WHERE universidad_carreras.id_universidad = $id";
    
$sql = "SELECT nombre_carrera FROM carreras WHERE id_uni = $id";

$result = mysqli_query($conn, $sql);
?>
<label class='form-label'>Selecciona la carrera:</label>

<select id='carrera' name='carrera' class='form-select' aria-label='Default select example' required>";
    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while ($fila = $result->fetch_assoc()) { ?>
            <option value='<?php echo $fila["nombre_carrera"] ?>'> <?php echo $fila["nombre_carrera"] ?></option>';
    <?php }
    }

    "</select>";


    ?>