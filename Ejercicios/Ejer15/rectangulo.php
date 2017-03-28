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
            $this->CalcularDatos();
        }

        protected function CalcularDatos()
        {
            $this->_perimetro = ($this->ladoUno * 2) + ($this->ladoDos * 2);
            $this->_superficie= $this->ladoUno * $this->ladoDos;
        }
        public function Dibujar()
        {
            for($i=0; $i < $this->ladoUno; $i++)
            {
                for($j=0; $j < $this->ladoDos; $j++)
                {
                    echo "*   ";
                }
                echo "<br>";
            }
        }

        public function ToString()
        {
            $this->Dibujar();           
            return "l1= $this->ladoUno<br>l2= $this->ladoDos<br>Perimetro= $this->_perimetro<br>Superficie= $this->_superficie";
        }

    }


?>