<?php

/**
 * Project
 * classe qui va générer toute la structure du projets
 */
class Project
{
    private $project_dirname = null;
    private $project_entries = [];
    private $type_project = '';

    private $types = ["design-system", "design-web", "theme-wordpress", "appli-web", "jeux-vidéo"];
    private $preprocesseurs = ["css", "less"];

    public $preproc = '';
    public $extensionDom = '';

    /**
     * getPreproc
     *
     * @return string
     */
    public function getPreproc()
    {
        return $this->preproc;
    }

    /**
     * getExtensionDom
     *
     * @return string
     */
    public function getExtensionDom()
    {
        return $this->extensionDom;
    }

    /**
     * createProject
     *
     * @return void
     */
    public function createProject()
    {

        $choices = $this->userChoices();
        $this->extensionDom = array_search("theme-wordpress", $choices) || array_search("appli-web", $choices) ? "php" : "html";

        $this->type_project = $choices[1];
        $this->preproc = $choices[2];
        $arborescence = $this->createDirectories($this->type_project);

        try {

            mkdir($this->project_dirname, 0755, true);

            foreach ($arborescence as $dir) {
                mkdir($this->project_dirname . $dir . DIRECTORY_SEPARATOR, 0755, true);
            }

            $this->createEntries();

            foreach ($this->project_entries as $obj) {

                $data = $obj->create();
                file_put_contents($obj->file_dir . $obj->file_name . '.' . $obj->file_extension, $data);
            }

        } catch (Exception $e) {
            var_dump($e->getMessage());
            die();
        }

    }

    /**
     * userChoices
     *
     * @return array
     */
    public function userChoices()
    {
        $name = readline('entrez le nom de votre Projet: ');
        $this->project_dirname = $name . DIRECTORY_SEPARATOR;

        foreach ($this->types as $keyType => $type) {
            echo $keyType . " " . $type . "\n";
        }
        $keyType = readline('choisissez le type de projet: ');
        $keyType = $this->saisiesKeys($this->types, $keyType);

        foreach ($this->preprocesseurs as $keyPreproc => $preprocesseur) {
            echo $keyPreproc . " " . $preprocesseur . "\n";
        }
        $keyPreproc = readline('choisissez votre préprocesseur: ');
        $keyPreproc = $this->saisiesKeys($this->preprocesseurs, $keyPreproc);

        return [$this->project_dirname, $this->types[$keyType], $this->preprocesseurs[$keyPreproc]];

    }

    /**
     * createDirectories
     *
     * @param  string $typeProject
     * @return array
     */
    public function createDirectories($typeProject)
    {
        if ($typeProject == "jeux-vidéo") {
            $arbo = ["js", "js/modules"];

        } else if ($typeProject == "appli-web") {
            $arbo = ["views", "public", "assets", "assets/css", "assets/js"];
        } else if ($typeProject == "theme-wordpress") {
            $arbo = ["assets", "assets/css", "assets/js"];

        } else {
            $arbo = ["css", "js"];
        }
        return $arbo;
    }

    /**
     * createEntries
     *
     * @return array créé les entré pour la boucle principale de création du projet
     */
    public function createEntries()
    {
        /**
        finaliser
         */

        if ($this->type_project === "theme-wordpress") {
            $this->project_entries = [
                $this->createEntry("index", $this->project_dirname, "dataHome", $this->extensionDom),
                $this->createEntry("style", $this->project_dirname, "dataStyle", $this->preproc),
                $this->createEntry("app", $this->project_dirname . "assets/js" . DIRECTORY_SEPARATOR, "dataJs", "js"),
            ];
        } else {
            $this->project_entries = [
                $this->createEntry("index", $this->project_dirname, "dataHome", $this->extensionDom),
                $this->createEntry("style", $this->project_dirname . "css" . DIRECTORY_SEPARATOR, "dataStyle", $this->preproc),
                $this->createEntry("app", $this->project_dirname . "js" . DIRECTORY_SEPARATOR, "dataJs", "js"),
            ];
        }
        $this->project_entries;
    }
    
    /**
     * createEntry
     *
     * @param  string $name
     * @param  string $dir
     * @param  string $datas
     * @param  string $ext
     * @return object
     */
    public function createEntry($name, $dir, $datas, $ext)
    {
        $object = ucfirst($datas);

        $entry = new $object($name, $this->type_project, $dir, $ext);
        return $entry;

    }
    
    /**
     * saisiesKeys
     *
     * @param  array $tab
     * @param  int $key
     * @return int
     */
    public function saisiesKeys($tab, $key)
    {
        while ($key < 0 || $key > count($tab) - 1) {
            echo "l entree n existe pas \n";
            $key = readline('Merci de saisir un index correct: ');
        }
        return $key;

    }
}
