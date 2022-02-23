<?php

class DataStyle extends DataFile
{
    private $preprocesseur;
    public $file_extension = '';
    public function __construct($name, $type, $dir,$ext)
    {
        parent::__construct($name, $type, $dir,$ext);
    }

    public function addExtension()
    {
        $obj = new Project();
        return $obj->preproc;
    }

    public function create()
    {
        $dataCss = '@color-dark: 0 0% 20%;
@color-white: 0 0% 100%;
@color-primary: 192 100% 50%;
@color-secondary: 36 100% 50%;
@color-tertiary: 178 85% 43%;
@import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400&display=swap");
@font-text: "Lato", sans-serif;

@line-height-custom: 2.5rem;

@fs-900: clamp(5rem, 8vw + 1rem, 9.375rem);
@fs-800: 3.5rem;
@fs-700: 1.5rem;
@fs-600: 1rem;
@fs-500: 1.75rem;
@fs-400: 0.9375rem;
@fs-300: 1rem;
@fs-200: 0.875rem;
@flow: 0.75rem;
@gap: 10px;
.bc-dark {
  background-color: hsl(@color-dark);
}

.bc-white {
  background-color: hsl(@color-white);
}

.bc-primary {
  background-color: hsl(@color-primary);
}

.bc-secondary {
  background-color: hsl(@color-secondary);
}

.bc-tertiary {
  background-color: hsl(@color-tertiary);
}

.text-dark {
  color: hsl(@color-dark);
}

.text-white {
  color: hsl(@color-white);
}

.text-primary {
  color: hsl(@color-primary);
}

.text-secondary {
  color: hsl(@color-secondary);
}

.text-tertiary {
  color: hsl(@color-tertiary);
}

.uppercase {
  text-transform: uppercase;
}

.letter-spacing {
  letter-spacing: 0.1rem;
}

.d-flex {
  display: flex;
  flex-wrap: wrap;
  gap: @gap;
}

.d-grid {
  display: grid;
}

.d-block {
  display: block;
}

.d-inline-block {
  display: inline-block;
}

.flow {
  margin-bottom: @flow;
}
.max-flow {
  @flow: 2rem;
  margin-bottom: @flow;
}

.center {
  max-width: 80%;
  margin: 0 auto;
}

main {
  width: 100%;
}' . "\n";

        $dataCss .= $this->resetCss();

        if ($this->type_project === "jeux-vidéo") {
            $dataCss .= $this->gameStyle();

        } else if ($this->type_project === "design-system") {
            $dataCss .= $this->designSystemStyle();
        } else {

            $dataCss .= $this->standartStyle();
        }
        return $dataCss;

    }

    public function resetCss()
    {
        $data = '* {
  margin: 0;
  padding: 0;
}

*,
::before,
::after {
  box-sizing: border-box;
}

html {
  font-size: @fs-300;
  font-family: @font-text;
  scroll-behavior: smooth;
}
body {
  line-height: 1.5rem;
}

img,
picture,
svg {
  max-width: 100%;
  height: auto;
  display: block;
}

canvas {
  max-width: 100%;
  max-height: 100vh;
}

a,
a:visited {
  &:extend(.text-dark);
  text-decoration: none;
}

ul,
ol {
  list-style: inside;
  list-style-type: none;
}

button,
input {
  background-color: transparent;
  outline: none;
  border: none;
}

@media (prefers-reduced-motion: reduce) {
  *,
  *::before,
  *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
    scroll-behavior: auto !important;
  }
}';
        return $data;
    }

    public function standartStyle()
    {

        $data = '.logo {
  width: 2rem;
  height: 2rem;
  display: inline-block;
}
#burger {
  position: fixed;
  right: 0;
  display: none;
  z-index: 1;
  width: 2rem;
  cursor: pointer;

  .trait {
    &:extend(.bc-dark);
    position: absolute;
    transform: translateY(-50%);
    top: 50%;
    width: 100%;
    height: 0.3rem;
    border-radius: 2px;
    transition: all 0.3s ease-in-out;

    &::before,
    &::after {
      content: "";
      &:extend(.bc-dark);
      position: absolute;
      display: block;
      width: 100%;
      height: 0.3rem;
      border-radius: 2px;
      transition: all 0.5s ease-in-out;
    }
    &::before {
      transform: translateY(-0.6rem);
    }
    &::after {
      transform: translateY(0.6rem);
    }
  }
  &.active {
    .trait {
      transform: translateX(-50%);
      background-color: transparent;
      &::before {
        &:extend(.bc-dark);
        transform: translate(50%, 0rem) rotateZ(45deg);
      }
      &::after {
        &:extend(.bc-dark);
        transform: translate(50%, 0rem) rotateZ(-45deg);
      }
    }
  }
}

.btn {
  &:extend(.text-white);
  background-color: hsl(@color-primary);
  display: block;
  width: fit-content;
  padding: 1rem 3rem;
  transition: 0.2s;
  &:hover {
    color: hsl(@color-dark);
  }
}
nav {
  > div {
    &:extend(.d-flex);
    justify-content: space-between;
    align-items: center;
    ul {
      &:extend(.d-flex);
      li {
        a {
        }
      }
    }
  }
}

header {
}

section {
  &:extend(.max-flow);
  > div {
    &:extend(.center);
  }
}

footer {
}

@media screen and (max-width: 600px) {
  #burger {
    display: block;
  }
  nav {
    padding: 1rem 0;
    > div {
      ul {
        position: fixed;
        top: 0;
        transform: translateX(100%);
        width: 100%;
        transition: 0.5s;
        li {
          width: 100%;
          text-align: center;
        }
        &.open {
          transform: translateX(0);
        }
      }
    }
  }
}

@media screen and (max-width: 360px) {
}';

        return $data;
    }

    public function gameStyle()
    {

        $data = '.container{
  background-color: hsl(@color-dark);
  position: relative;
  width: 100%;
  min-height: 100vh;
  &:extend(.d-flex);
  justify-content: center;
  align-items: center;
  overflow: hidden;
}

.game-container {
  position: relative;
  width: 352;
  height: 198;
  border-radius: 0.5rem;
  border: 2px solid hsl(@color-white);
  transform: scale(3);
}

.game-canvas {
  image-rendering: pixelated;
}';

        return $data;
    }

    public function designSystemStyle()
    {

        $data = '.btn {
  &:extend(.text-white);
  background-color: hsl(@color-primary);
  display: block;
  width: fit-content;
  padding: 1rem 3rem;
  transition: 0.2s ease-in-out;
  &:hover {
    transform: scale(1.1);
    filter: drop-shadow(0.1rem 0.1rem 0.2rem hsl(@color-dark / 0.22));
  }
}

.play {
  position: relative;
  width: 5rem;
  height: 5rem;
  background-color: hsl(@color-primary);
  border-radius: 50%;
  cursor: pointer;
  filter: drop-shadow(0.2rem 0.2rem 0.65rem hsl(@color-dark / 0.2));
  transition: filter 0.2s ease-in-out;
  svg {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    fill: hsl(@color-white);
  }
  &:hover {
    filter: drop-shadow(0.3rem 0.3rem 0.75rem hsl(@color-dark / 0.22));
  }
}

section {
  &:extend(.max-flow);
  padding: 2rem 0;
  > h2 {
    margin: 0 auto @flow;
    max-width: 80%;
  }
  > div {
    &:extend(.center);
  }
}

header {
  &:extend(.max-flow);
  padding: 4rem 0;
  h1 {
    text-align: center;
  }
}

.colors {
  > div {
    &:extend(.d-flex);
    justify-content: space-between;
    .color {
      width: calc((100% / 3) - @gap);
      transition: width 0.2s;
      > div {
        &:extend(.flow);
        border: 1px solid black;
        padding: 3rem @gap @gap;
      }
      p {
        font-size: @fs-200;
      }
    }
    :nth-child(1) {
      div {
        &:extend(.bc-dark);
        &:extend(.text-white);
      }
    }
    :nth-child(2) {
      div {
        &:extend(.bc-white);
      }
    }
    :nth-child(3) {
      div {
        &:extend(.bc-primary);
        &:extend(.text-dark);
      }
    }
    :nth-child(4) {
      div {
        &:extend(.bc-light-grey);
      }
    }
  }
}

.typo {
  background-color: hsl(@color-dark / 0.05);
  > div {
    &:extend(.d-flex);
    > div {
      > * {
        &:extend(.flow);
      }
    }
    > * {
      width: calc(50% - @gap);
    }
    h1 {
      font-size: @fs-800;
      line-height: @line-height-custom;
      &:extend(.letter-spacing);
      &:extend(.max-flow);
    }

    h2 {
      font-size: @fs-700;
      line-height: @line-height-custom;
      &:extend(.letter-spacing);
    }

    h3,
    h4,
    h5,
    h6,
    p {
      color: hsl(@color-dark / 0.5);
      &:extend(.letter-spacing);
    }
  }
}

.components {
  .btn {
    &:extend(.max-flow);
  }
}

@media screen and (max-width: 600px) {
  .colors {
    > div {
      .color {
        width: calc(50% - @gap);
      }
    }
  }
  .typo {
    > div {
      > * {
        width: 100%;
      }
      h1 {
        font-size: @fs-700;
      }

      h2 {
        font-size: @fs-600;
      }
    }
  }
}

@media screen and (max-width: 360px) {
  .typo {
    > div {
      text-align: center;
    }
  }
  .colors {
    > div {
      .color {
        width: 100%;
      }
    }
  }
}';

        return $data;
    }
}
