<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumar</title>
</head>
<body>
    <h3>Función suma</h3>
    <form method="post">
        Escribe el primer número: <input type="number" name="valor1" value="5"><br>
        Escribe el segundo número: <input type="number" name="valor2" value="3"><br>
        <input type="submit" name="submit" value="Enviar">
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['valor1']) && !empty($_POST['valor2'])) {
        $num1 = $_POST['valor1'];
        $num2 = $_POST['valor2'];
        if (!intval($num1) || !intval($num2)) {
            echo "Ingresa valores numéricos";
        } 
        else {
            $suma = $num1 + $num2;
            echo "R= $num1 + $num2 = $suma";
        }
    } 
    else {
        echo "Llena los campos";
    }
}

echo "<br><br><a href='index.php'>Regresar al menu</a>";

?>

