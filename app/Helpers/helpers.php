<?php


function userFullName(){
    return auth()->user()->lastName . " " . auth()->user()->name;
}
