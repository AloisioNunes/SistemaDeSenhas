<?php

    class DataHora {

        private $data;

        function __construct() {
            date_default_timezone_set('Brazil/East');
            $this->data = getdate(time());
        }

        function getData() {

            $dia = $this->data['mday'];
            $mes = $this->data['mon'];
            $ano = $this->data['year'];

            if ($dia < 10) {
                $dia = "0".$dia;
            }

            if ($mes < 10) {
                $mes = "0".$mes;
            }

            return $ano."-".$mes."-".$dia;

        }

        function getHora() {

            $hora = $this->data['hours'];
            $minuto = $this->data['minutes'];
            $segundo = $this->data['seconds'];

            if ($hora < 10) {
                $hora = "0".$hora;
            }

            if ($minuto < 10) {
                $minuto = "0".$minuto;
            }

            if ($segundo < 10) {
                $segundo = "0".$segundo;
            }

            return $hora.":".$minuto.":".$segundo;

        }

        function getDataHora(){
            return $this->getData()." às ".$this->getHora();
        }

    }

?>