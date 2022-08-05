<?php

function dd($input){ //danf no codigo,só definindo, mostra valor da variavel//
    var_dump($input);// mostra todas as informacoes do projeto, ixibir,mostrar//
    die(); //tipo um break//
}

$mainPosition = __DIR__;

require_once("{$mainPosition}\bootstrap\Env.php");// tudo que vai carregar, comecar,levantar, estartar, primeiras camadas//
// .env 

$env = new Env();
dd($env);