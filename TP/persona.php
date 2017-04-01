<?php

        abstract class Persona
        {
            private $_nombre;
            private $_apellido;
            private $_dni;            
            private $_sexo;

            public function __construct($pNombre, $pApellido, $pDni, $pSexo)
            {
                $this->_nombre = $pNombre;
                $this->_apellido = $pApellido;
                $this->_dni = $pDni;
                $this->_sexo = $pSexo;
            }

            public function getNombre()
            {
                return $this->_nombre;
            }
            public function getApellido()
            {
                return $this->_apellido;
            }
            public function getDni()
            {
                return $this->_dni;
            }
            public function getSexo()
            {
                return $this->_sexo;
            }

            
            public abstract function Hablar($pIdioma);
            
           

            public function ToString()
            {
                return "$this->_nombre - $this->_apellido - $this->_dni - $this->_sexo";
            }
        }


?>