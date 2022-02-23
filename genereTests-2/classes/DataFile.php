<?php

/**
 * DataFile
 * classe qui va servir de mere pour les classes des différents fichiers
 */
class DataFile
{
    public $file_name = '';
    public $type_project = '';
    public $file_dir = '';
    public $file_extension = '';

    public function __construct($name, $type, $dir,$ext)
    {
        $this->file_name = $name;
        $this->type_project = $type;
        $this->file_dir = $dir;
        $this->file_extension = $ext;

    }

}
