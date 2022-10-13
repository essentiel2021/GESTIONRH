<?php

use Illuminate\Support\Str;


function userFullName(){
    return auth()->user()->lastName . " " . auth()->user()->name;
}
function getRolesName(){
    $roleLibelle = "";
    $i= 0;
    foreach(auth()->user()->roles as $role){
        $roleLibelle .= $role->libelle;

        if($i < sizeof(auth()->user()->roles)-1)
        {
            $roleLibelle .= " ,";
        }
        $i++;
    }
    return $roleLibelle;
}

function contains($container, $contenu){
    return Str::contains($container, $contenu);
}

function setMenuClass($route){
    $routeActuel = request()->route()->getName();
    if(contains($routeActuel,$route)){
        return ;
    }
    return "";
}

function setMenuActive($route,$class){
    $routeActuel = request()->route()->getName();
    if(contains($routeActuel,$route)){
        return $class;
    }
    return "";
}