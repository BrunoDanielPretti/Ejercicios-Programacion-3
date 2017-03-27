<?php
    abstract class FiguraGeometrica
    {
        protected $_color;
        protected $_superficie;
        protected $_perimetro;

        public function __contruct()
        {

        }

        public function GetColor()
        {
            return $this->_color;
        }
        public function SetColor($pColor)
        {
            $this->_color = $pColor;
        }
        
        protected function ToString()
        {
            
        }

        public abstract function Dibujar();
        

        protected abstract function CalcularDatos();
       
        
    }

    


?>