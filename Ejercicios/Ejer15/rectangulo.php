<?php
    require_once "FiguraGeometrica.php";

    class Rectangulo extends FiguraGeometrica
    {
        private $ladoUno;
        private $ladoDos;

        public function __construct($l1, $l2)
        {
            $this->ladoUno = $l1;
            $this->ladoDos = $l2;
        }

        protected function CalcularDatos()
        {
            $this->perimetro = ($this->ladoUno * 2) + ($this->ladoDos * 2);
        }
        public function Dibujar()
        {}

        public function ToString()
        {
            return "l1= $this->ladoUno<br>l2= $this->ladoDos<br>Perimetro= $this->_perimetro";
        }

    }


?>