<?php

class Security{
    public static function secureHTML($chaine){
        return htmlentities($chaine);
    }
}