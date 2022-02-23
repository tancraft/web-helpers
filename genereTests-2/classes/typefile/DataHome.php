<?php

class DataHome extends DataFile
{
    public $file_extension = '';
    public function __construct($name, $type, $dir,$ext)
    {
        parent::__construct($name, $type, $dir,$ext);
    }

    public function addExtension()
    {
        $obj = new Project();
        return $obj->extensionDom;
    }

    public function create()
    {
        $dataHtml = $this->addHeader();

        if ($this->type_project === "jeux-vidéo") {
            $dataHtml .= $this->gameIndex();

        } else if ($this->type_project === "design-system") {
            $dataHtml .= $this->designSystemIndex();
        } else if ($this->type_project === "theme-wordpress") {
            $dataHtml .= $this->wordpressIndex();
        } else {
            $dataHtml .= $this->standartIndex();
        }
        $dataHtml .= $this->addHeader();

        return $dataHtml;

    }

    public function addHeader()
    {

        if ($this->type_project === "theme-wordpress") {
            $data = '<?php get_header(); ?>';
        } else if ($this->type_project === "appli-web") {
            $data = '<?php' . "\n\n" . 'include "../views/header.php"; ?>';

        } else {
            $data = '<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>' . $this->file_name . '</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="container">';

        }

        return $data;
    }

    public function addFooter()
    {

        if ($this->type_project === "theme-wordpress") {
            $data = '<?php get_footer(); ?>';
        } else if ($this->type_project === "appli-web") {
            $data = '<?php' . "\n\n" . 'include "../views/footer.php"; ?>';

        } else {
            $data = '</div>' . "\n\n\t" . '<script src="js/app.js"></script>' . "\n\t" . '</body>' . "\n" . '</html>';

        }

        return $data;
    }

    public function standartIndex()
    {

        $data = '<nav>
        <div>
          <a href="" class="logo"><img src="imgs/logo.svg" alt=""> </a>
          <div id="burger">
            <div class="trait"></div>
          </div>
          <ul id="navbar">
            <li><a href="">Home</a></li>
            <li><a href="">About Us</a></li>
            <li><a href="">Products</a></li>
            <li><a href="">Contact</a></li>
          </ul>
        </div>
      </nav>
      <header></header>
      <main>
        <section></section>
        <section></section>
      </main>
      <footer></footer>';

        return $data;
    }

    public function gameIndex()
    {

        $data = '<div class="game-container">
                <canvas class="game-canvas" width="352" height="198"></canvas>
                </div>';

        return $data;
    }

    public function designSystemIndex()
    {

        $data = '<header>
<h1>Design System</h1>
</header>
<main>
<section class="colors">
<h2><span>01</span> Colors</h2>
<div>
<div class="color">
<div><p>#252525</p></div>
<p>RGB: 37 37 37</p>
<p>HSL: 0 0% 15%</p>
</div>
<div class="color">
<div><p>#ffffff</p></div>
<p>RGB: 255 255 255</p>
<p>HSL: 0 0% 100%</p>
</div>
<div class="color">
<div><p>#10c9c3</p></div>
<p>RGB: 16 201 195</p>
<p>HSL: 178 92% 79%</p>
</div>
</div>
</section>
<section class="typo">
<h2><span>02</span> text</h2>
<div>
<div>
<h1>We Design and Develop</h1>
<h2>Professional Skills</h2>
<h3>graphic design</h3>
<h4>photography</h4>
<h5>SEO / marketing</h5>
<h6>web development</h6>
</div>
<p>
Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio et
non consectetur optio culpa aliquam consequuntur dicta repellat
eligendi laborum. Consequuntur nihil quod debitis incidunt sit
dolorem odit exercitationem, fugiat minus non temporibus nostrum
necessitatibus ratione, aut aspernatur doloremque dolor.
</p>
</div>
</section>
<section class="components">
<h2><span>03</span> Components</h2>
<div>
<a class="btn" href="#">Voir plus</a>
<button class="play">
<svg
xmlns="http://www.w3.org/2000/svg"
width="40"
height="40"
viewbox="0 0 40 40"
>
<polygon
points="40 20 0 40 0 0 40 20"
/>
</svg>
</button>
</div>
</section>
</main>';

        return $data;
    }

    public function wordpressIndex()
    {

        $data = '<?php if (have_posts()): ?>
    <div class="row">

        <?php while (have_posts()): the_post();?>
	            <div class="col-sm-4">
	                <div class="card">
	                    <?php the_post_thumbnail("medium", ["class" => "card-img-top", "alt" => "", "style" => "height: auto;"])?>
	                    <div class="card-body">
	                        <h5 class="card-title"><?php the_title()?></h5>
	                        <h6 class="card-subtitle mb-2 text-muted"><?php the_category()?></h6>
	                        <p class="card-text">
	                            <?php the_excerpt()?>
	                        </p>
	                        <a href="<?php the_permalink()?>" class="card-link">Voir plus</a>
	                    </div>
	                </div>
	            </div>
	        <?php endwhile?>

    </div>
<?php else: ?>
    <h1>Pas d\'articles</h1>
<?php endif;?>';
        return $data;
    }
}
