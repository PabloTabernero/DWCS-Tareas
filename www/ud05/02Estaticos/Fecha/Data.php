<?php

class Data
{
    private static $calendario = "Calendario gregoriano";
    //Arrays para fomatear la fecha.
    private static $dias = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado'];
    private static $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    //Devuelve la fecha en formato: w(numero de día de semana)-j(numero dia del mes sin ceros)-n(numero de mes sin ceros)-Y(año).
    public static function getData()
    {
        return date('w-j-n-Y');
    }

    public static function getCalendar() {
        return self::$calendario;
    }

    public static function getHora() {
        date_default_timezone_set('Europe/Madrid');
        return date('H:i:s');
    }

    public static function getDataHora() {
        echo "Usamos el calendario: ".self::getCalendar().'<br />';
        
        //Obtiene la fecha de getData() y la almacena en array para formatearla.
        $fecha = explode('-', self::getData());
        $diaTexto = self::$dias[$fecha[0]];
        $diaNumero = $fecha[1];
        $mesTexto = self::$meses[$fecha[2] - 1];
        $año = $fecha[3];

        //Obtiene la hora ya formateada.
        $hora = self::getHora();

        echo "Hoy es $diaTexto $diaNumero de $mesTexto del $año y son las $hora";
    }
}
