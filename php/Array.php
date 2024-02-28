<?php
echo "Arreglo: [1, 3, 2, 10, 24, 1200, 11, 34, 55, 12] <br>";
$arreglo = [1, 3, 2, 10, 24, 1200, 11, 34, 55, 12];
$acumulador = array();
foreach($arreglo as $valor){
    if($valor % 2 == 0){
        $acumulador[] = $valor;
    }
}
for($indice = 0; $indice < count($acumulador); $indice++){
    echo "<br>".$acumulador[$indice];
}

echo "<br><br><a href='index.php'>Regresar al menu</a>";

?>