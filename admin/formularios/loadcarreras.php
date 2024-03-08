<?php


require_once '../../conexion.php';


$columns = ['id', 'nombre_carrera'];


$table = "carreras";

$id = 'id';

$campo = isset($_POST['campoCarrera']) ? $conn->real_escape_string($_POST['campoCarrera']) : null;



$where = '';

if ($campo != null) {
    $where = "WHERE (";

    $cont = count($columns);
    for ($i = 0; $i < $cont; $i++) {
        $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}


$limit = isset($_POST['registroscarrera']) ? $conn->real_escape_string($_POST['registroscarrera']) : 10;
$pagina = isset($_POST['paginacarrera']) ? $conn->real_escape_string($_POST['paginacarrera']) : 0;

if (!$pagina) {
    $inicio = 0;
    $pagina = 1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit = "LIMIT $inicio , $limit";


 $sOrder = "";
 if(isset($_POST['orderColcarrera'])){
    $orderColcarrera = $_POST['orderColcarrera'];
    $orderTypecarrera = isset($_POST['orderTypecarrera']) ? $_POST['orderTypecarrera'] : 'asc';
    
    $sOrder = "ORDER BY ". $columns[intval($orderColcarrera)] . ' ' . $orderTypecarrera;
 }



$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table
$where
$sOrder
$sLimit";
$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;


$sqlFiltro = "SELECT FOUND_ROWS()";
$resFiltro = $conn->query($sqlFiltro);
$row_filtro = $resFiltro->fetch_array();
$totalFiltro = $row_filtro[0];


$sqlTotal = "SELECT count($id) FROM $table ";
$resTotal = $conn->query($sqlTotal);
$row_total = $resTotal->fetch_array();
$totalRegistros = $row_total[0];

$output = [];
$output['totalRegistros'] = $totalRegistros;
$output['totalFiltro'] = $totalFiltro;
$output['data'] = '';
$output['paginacion'] = '';

if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
   
        $output['data'] .= '<tr class ="tr-select" onclick="mostrarDetalles('. $row["id"] .')" >';
        $output['data'] .= '<td>' . $row['id'] . '</td>';
        $output['data'] .= '<td>' . $row['nombre_carrera'] . '</td>';
       
        $output['data'] .= '<td><a class="fas fa-times-circle" onclick="confirmarEliminacionCarreras(' .$row['id'] . ')"></a></td>';
        

    }
} else {
    $output['data'] .= '<tr>';
    $output['data'] .= '<td colspan="7">Sin registro</td>';
    $output['data'] .= '</tr>';
}

if ($output['totalRegistros'] > 0) {
    $totalPaginas = ceil($output['totalRegistros'] / $limit);

    $output['paginacion'] .= '<nav>';
    $output['paginacion'] .= '<ul class="pagination">';

    $numeroInicio = 1;

    if(($pagina - 4) > 1){
        $numeroInicio = $pagina - 4;
    }

    $numeroFin = $numeroInicio + 9;

    if($numeroFin > $totalPaginas){
        $numeroFin = $totalPaginas;
    }

    for ($i = $numeroInicio; $i <= $numeroFin; $i++) {
        if ($pagina == $i) {
            $output['paginacion'] .= '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
        } else {
            $output['paginacion'] .= '<li class="page-item"><a class="page-link" href="#" onclick="nextPagecarrera(' . $i . ')">' . $i . '</a></li>';
        }
    }

    $output['paginacion'] .= '</ul>';
    $output['paginacion'] .= '</nav>';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
