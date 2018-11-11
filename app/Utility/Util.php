<?php

namespace App\Utility;

class Util {

    

    public static function crearCodigo($longitud)
    {
        //creamos la variable codigo
        $codigo = "";
        //caracteres a ser utilizados
        $caracteres="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        //el maximo de caracteres a usar
        $max=strlen($caracteres)-1;
        //creamos un for para generar el codigo aleatorio utilizando parametros min y max
        for($i=0;$i < $longitud;$i++)
        {
            $codigo.=$caracteres[rand(0,$max)];
        }
        //regresamos codigo como valor
        return $codigo;
    }

    public static function getRespuestaFlash($respuesta){
        $respuestaFlash = Array();
        if($respuesta['tipo'] == 'error'){
            $respuestaFlash['tipo'] = 'danger';
            $respuestaFlash['msj'] = $respuesta['msj'];
        }else{
            $respuestaFlash['tipo'] =$respuesta['tipo'];
            $respuestaFlash['msj'] = $respuesta['msj'];
        }
        return $respuestaFlash;
    }

}