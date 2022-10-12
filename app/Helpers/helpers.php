<?php


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
