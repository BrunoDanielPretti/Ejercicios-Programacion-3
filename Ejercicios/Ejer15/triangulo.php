<?php
    require_once "FiguraGeometrica.php";

    class Triangulo extends FiguraGeometrica
    {
        private $_base;
        private $_altura;

        public function __construct($pBase, $pAltura)
        {
            $this->_base = $pBase;
            $this->_altura= $pAltura;
            $this->CalcularDatos();
        }

        protected function CalcularDatos()
        {
            $this->_superficie = ($this->_base * $this->_altura) / 2;
            $this->_perimetro = ($this->_base + $this->_altura) * 2;
        }

        public function Dibujar()
        {
             for($i=0; $i < $this->_base; $i++)
            {
                for($j=0; $j < $this->_altura; $j++)
                {                    
                    echo "*";
                    if($i <= $j)
                        break;
                }
                echo "<br>";
            }
        }

        public function ToString()
        {
           $this->Dibujar();
            return "Base: $this->_base<br>Altura: $this->_altura<br>Superficie: $this->_superficie<br>Perimetro: $this->_perimetro";


        }
    }


?>