<?php

/**
 * ecriture des datas necessaire au remplissage des fichiers ne necessitant pas de valeurs dynamiques
 */

$dataCss = '// style: master.less

@darker-color: #34373b;
@lighter-color: #eeeeee;
@primary-color: #32e0c4;
@icons-color: #828282;

@font-family: Arial, sans-serif;
@font-size: 100%;
/*----------------------------------mixins*/
.center(@width: 60%) {
  width: @width;
  margin: 0 auto;
}

.flex {
  display: flex;
  flex-wrap: wrap;
}

/*-------------------------------------reset*/
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

figure {
  margin-block-start: 0;
  margin-block-end: 0;
  margin-inline-start: 0;
  margin-inline-end: 0;
}

html {
  font-size: @font-size;
  font-family: @font-family;
  scroll-behavior: smooth;
}

img,
video,
canvas,
figure,
audio,
svg {
  max-width: 100%;
  height: auto;
}

a,
a:visited {
  color: @darker-color;
  text-decoration: none;
}

ul,
ol {
  list-style: inside;
  list-style-type: none;
}
/*-------------------------------------layout*/';
;

$dataJs = 'window.addEventListener("DOMContentLoaded", () => {
          const parent = document.querySelector("section");
          let element = document.createElement("div");
          element.setAttribute("id", "js-id");
          element.innerHTML = "div en js";
          parent.appendChild(element);
          });';

$dataSvg = '<svg " xmlns="http://www.w3.org/2000/svg" width="277.45" height="369.64" viewbox="0 0 277.45 369.64">
              <path " d="M138.7,431.06H353.82a30.75,30.75,0,0,0,30.66-30.66V93.08a30.75,30.75,0,0,0-30.66-30.66H196.31L108,150.7V400.4A30.75,30.75,0,0,0,138.7,431.06Z" transform="translate(-107.54 -61.92)"/>
              <path d="M108,150.7h57.61A30.75,30.75,0,0,0,196.31,120V62.42Z" transform="translate(-107.54 -61.92)"/><rect x="22.76" y="169.84" width="231.93" height="118.24" rx="16.22"/>
              <path d="M215.33,280.71q-.9-7.21-5.56-10.52t-13.57-3.31q-7.26,0-11.42,1.81a13.82,13.82,0,0,0-6.23,5,12.13,12.13,0,0,0-2.08,6.76,11.32,11.32,0,0,0,4.05,9q4,3.52,13.46,5.64c3.85.84,6.29,1.74,7.35,2.69a4.25,4.25,0,0,1,1.58,3.23,4.32,4.32,0,0,1-1.66,3.34,7,7,0,0,1-4.73,1.44,7.55,7.55,0,0,1-6.33-2.81,10.41,10.41,0,0,1-1.81-5.07l-13.65.85a17.93,17.93,0,0,0,5.17,11.59q4.54,4.57,16.39,4.56a27.84,27.84,0,0,0,11.18-1.95,15.42,15.42,0,0,0,6.91-5.71,14.77,14.77,0,0,0,2.47-8.23,13.06,13.06,0,0,0-1.86-6.87,14.12,14.12,0,0,0-5.92-5.15c-2.72-1.38-7.2-2.76-13.47-4.11-2.54-.53-4.14-1.09-4.82-1.7a2.62,2.62,0,0,1-1-2,3.25,3.25,0,0,1,1.27-2.59,5.71,5.71,0,0,1,3.77-1.05,6.29,6.29,0,0,1,7,6Z" transform="translate(-107.54 -61.92)"/><polygon class="cls-3" points="111.94 205.75 129.48 252.17 145.03 252.17 162.25 205.75 147.69 205.75 137.4 239.16 126.94 205.75 111.94 205.75"/>
              <path class="cls-3" d="M282.84,269.13a20.38,20.38,0,0,0-9.19,8.52,26.77,26.77,0,0,0-3.14,13.23,27.6,27.6,0,0,0,2.88,12.79,19.11,19.11,0,0,0,8.07,8.39q5.21,2.82,13.47,2.82a38.09,38.09,0,0,0,11.61-1.57,45.22,45.22,0,0,0,11.25-5.9V287.62H295.63v9.65h9.59v4.38a25.49,25.49,0,0,1-5,2.37,15.14,15.14,0,0,1-4.59.7,10,10,0,0,1-7.9-3.23q-2.84-3.23-2.84-10.77,0-7.1,2.81-10.37a9.39,9.39,0,0,1,7.52-3.28,9.06,9.06,0,0,1,5.2,1.39,7.55,7.55,0,0,1,2.91,4L317.16,280a19,19,0,0,0-3.78-7.42,15,15,0,0,0-6.33-4.33q-3.82-1.39-11.51-1.39C290.22,266.88,286,267.62,282.84,269.13Z" transform="translate(-107.54 -61.92)"/>
            </svg>';

/**
 * tableau contenant l arborescense du projet
 */

$project = ['js' => ['app.js', $dataJs], 'css' => ['style.less', $dataCss], 'imgs' => ['logo.svg', $dataSvg]];

/**
 * demandes des infos dont nous avons besoin aupres de l utilisateur
 */

$testName = readline('entrez le nom de votre test: ');
$jquery = strtoupper(readline('avez vous besoin de jquery? (entrer Y/N): '));

/**
 * variables neceissitant les données utilisateur
 */
$flag = ($jquery == 'Y') ? true : false;

$projectDir = $testName . DIRECTORY_SEPARATOR;

$dataHtml = '<!DOCTYPE html>
            <html lang="fr">
              <head>
                <meta charset="UTF-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <title>' . $testName . '</title>
                <link rel="stylesheet" href="css/style.css" />
              </head>
              <body>
                <div class="container">
                <header>
                  <h1>' . $testName . '</h1>
                </header>
                <main>
                  <section>
                  </section>
                </main>
                </div>';
if ($flag) {
    $dataHtml .= "\n\n\t" . '<script src="JS/jquery-3.6.0.min.js"></script>';
} else {
    $dataHtml .= '';
}
$dataHtml .= "\n\t" . '<script src="js/app.js"></script>
            </body>
            </html>';

/**
 * logique permettant la creation de fichiers
 */

try {

    mkdir($projectDir, 0755, true);
    file_put_contents($projectDir . 'index.html', $dataHtml);

    foreach ($project as $key => $elt) {
        mkdir($projectDir . $key . DIRECTORY_SEPARATOR, 0755, true);
        file_put_contents($projectDir . $key . DIRECTORY_SEPARATOR . $elt[0], $elt[1]);
    }
    if ($flag) {
        copy('jquery-3.6.0.min.js', $projectDir . 'JS/jquery-3.6.0.min.js');
    }

} catch (Exception $e) {
  var_dump($e->getMessage());
  die();
}
