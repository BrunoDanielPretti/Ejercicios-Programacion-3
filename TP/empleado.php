<?php
    class Empleado extends Persona
    {
        protected $_legajo;
        protected $_sueldo;

        public function __construct($pNombre, $pApellido, $pDni, $pSexo, $pLegajo, $pSueldo)        
        {
            parent::__construct($pNombre, $pApellido, $pDni, $pSexo);
            $this->_legajo = $pLegajo;
            $this->_sueldo = $pSueldo;
        }

        public function getLegajo()
        {
            return $this->_legajo;
        }
        public function getSueldo()
        {
            return $this->_sueldo;
        }

        public function ToString()
        {
            return parent::ToString()." - $this->_legajo - $this->_sueldo";
        }

        public function Hablar($pIdioma)
        {
            return "El Empleado habla ".$pIdioma;
        }

    }



?>