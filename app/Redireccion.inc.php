<?php
class Redireccion{
    public static function redirigir($url){
        header("Location:".$url,true,301);  //301: Indica redireccion
        exit();
    }
}
