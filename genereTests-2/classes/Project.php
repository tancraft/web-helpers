<?php

class Project
{
    private $project_dirname = null;
    private $project_entries = [];
    private $type_project = '';

    private $projectTypes = ["design-system", "design-web", "theme-wordpress", "appli-web", "jeux-vidéo"];
    private $preprocesseurs = ["css", "less"];

    public function createProject()
    {

        $choices = $this->userChoices();
        $extensionHome = array_search("theme-wordpress", $choices) || array_search("appli-web", $choices) ? "php" : "html";

        $this->type_project = $choices[1];
        $preproc = $choices[2];
        $arborescence = $this->createDirectories($this->type_project);

        try {

            mkdir($this->project_dirname, 0755, true);
            
            foreach ($arborescence as $dir) {
                mkdir($this->project_dirname . $dir . DIRECTORY_SEPARATOR, 0755, true);
            }

            $home = new Home("index", $this->type_project);
            $style = new StyleFile("style", $this->type_project, $preproc);
            $jsApp = new JsFile("app", $this->type_project);

            $dataHtml = $home->create();
            file_put_contents($this->project_dirname . 'index' . '.' . $extensionHome, $dataHtml);

            // ici y aura un foreach c est sur

            $dataStyle = $style->create();
            $dataJs = $jsApp->create();

            file_put_contents($this->project_dirname . $arborescence[0] . DIRECTORY_SEPARATOR . 'style' . '.' . $preproc, $dataStyle);
            file_put_contents($this->project_dirname . $arborescence[1] . DIRECTORY_SEPARATOR . 'app' . '.' . $arborescence[1], $dataJs);

            // foreach ($project as $key => $elt) {
            //     mkdir($projectDir . $key . DIRECTORY_SEPARATOR, 0755, true);
            //     file_put_contents($projectDir . $key . DIRECTORY_SEPARATOR . $elt[0], $elt[1]);
            // }

        } catch (Exception $e) {
            var_dump($e->getMessage());
            die();
        }

    }

    public function createDirectories($typeProject)
    {
        //faudra pas oublier d enlever les array_merge et de virer $arbo = ["css", "js"]; partout sauf dans le else quand j aurais fait le foreach des files

        if ($typeProject == "jeux-vidéo") {
           $arbo = array_merge(["css", "js"], ["js", "js/modules"]);

        } else if ($typeProject == "appli-web") {
           $arbo = array_merge(["css", "js"], ["views", "public", "assets", "assets/css", "assets/js"]);
        } else if ($typeProject == "theme-wordpress") {
            $arbo = array_merge(["css", "js"], ["assets", "assets/css", "assets/js"]);

        } else {
           $arbo = ["css", "js"];
        }
        return $arbo;
    }

    public function userChoices()
    {
        $name = readline('entrez le nom de votre Projet: ');
        $this->project_dirname = $name . DIRECTORY_SEPARATOR;

        foreach ($this->projectTypes as $keyType => $type) {
            echo $keyType . " " . $type . "\n";
        }
        $keyType = readline('choisissez le type de projet: ');
        $keyType = $this->saisiesKeys($this->projectTypes, $keyType);

        foreach ($this->preprocesseurs as $keyPreproc => $preprocesseur) {
            echo $keyPreproc . " " . $preprocesseur . "\n";
        }
        $keyPreproc = readline('choisissez votre préprocesseur: ');
        $keyPreproc = $this->saisiesKeys($this->preprocesseurs, $keyPreproc);

        return $this->project_entries = [$this->project_dirname, $this->projectTypes[$keyType], $this->preprocesseurs[$keyPreproc]];

    }

    public function saisiesKeys($tab, $key)
    {
        while ($key < 0 || $key > count($tab) - 1) {
            echo "l entree n existe pas \n";
            $key = readline('Merci de saisir un index correct: ');
        }
        return $key;

    }
}
