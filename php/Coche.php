<?php
class Coche{
    public $brand = '';
    public $model = '';

    public function __construct($brand, $model) {
        $this->brand = $brand;
        $this->model = $model;
    }

    public function getDetails(){
        echo "La marca del coche es <b>".$this->brand."</b> y el modelo es <b>".$this->model."</b>";
    }
}

$objeto = new Coche('Volkswagen','Vento');

$objeto->getDetails();

echo "<br><br><a href='index.php'>Regresar al menu</a>";

?>