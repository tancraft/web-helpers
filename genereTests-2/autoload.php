<?php

function autoLoad($class)
{
    if (file_exists("classes/" . $class . ".php")) {
        require "classes/" . $class . ".php";
    }
    if (file_exists("classes/typefile/" . $class . ".php")) {
    require "classes/typefile/" . $class . ".php";
}


}
spl_autoload_register("autoLoad");
