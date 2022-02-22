<?php

class File
{
    protected $file_name = null;
    protected $type_project = null;

    public function __construct($name, $type)
    {
        $this->file_name = $name;
        $this->type_project = $type;
    }

    public function create(){

    }

}

