<?php
    
    function dd($input){
        var_dump($input);
        die();
    }

    function env($nameOfVariable){
        return $_ENV[$nameOfVariable];
    }
