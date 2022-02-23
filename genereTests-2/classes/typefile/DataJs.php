<?php

class DataJs extends DataFile
{
    public function __construct($name, $type, $dir, $ext)
    {
        parent::__construct($name, $type, $dir, $ext);
    }

    /**
     * create
     *créé les données a inserer dans le fichier javascript principal du projet
     * @return string
     */
    public function create()
    {
        $dataJs = 'console.log("it\'s work");';

        if ($this->type_project === "jeux-vidéo") {
            $dataJs .= $this->gameJs();

        } else {

            $dataJs .= $this->standartJs();
        }
        return $dataJs;

    }

    public function standartJs()
    {

        $data = 'class ToggleMenu {
  constructor(burger, navbar) {
    this.burger = document.getElementById(burger);
    this.navbar = document.getElementById(navbar);
    this.navlinks = document.querySelectorAll(`#${navbar} li a`);
    this.burger.addEventListener("click", () => {
      this.burger.classList.toggle("active");
      this.navbar.classList.toggle("open");
    });
  }
  closLinks() {
    this.navlinks.forEach((item) => {
      item.addEventListener("click", () => {
        this.burger.classList.toggle("active");
        this.navbar.classList.toggle("open");
      });
    });
  }
}

window.addEventListener("DOMContentLoaded", () => {
  const burger = new ToggleMenu("burger", "navbar");
  burger.closLinks();
});';

        return $data;
    }

    public function gameJs()
    {

        $data = 'console . log("video games");';

        return $data;
    }
}
