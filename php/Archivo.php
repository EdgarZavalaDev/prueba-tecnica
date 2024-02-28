<?php
$archivo = "datos.txt";
if(file_exists($archivo)) {
    $resultado = file_get_contents($archivo);
    echo nl2br($resultado);
} 
else {
    echo "El archivo no existe y/o no es válido.";
}

echo "<br><br><a href='index.php'>Regresar al menu</a>";

?>
