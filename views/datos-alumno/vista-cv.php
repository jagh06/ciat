<?php 
$ruta_pdf = $_GET['ruta']; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista del PDF</title>
</head>

<body>

    <!-- Visor de PDF -->
    <embed src="<?php echo $ruta_pdf; ?>"  target="_blank"/>

</body>

</html>