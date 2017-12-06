<?php

include_once __DIR__."/../generics.php";

class LineGenerator extends Thread {

  public $arr;

  private $size;

  private $minFloat;

  private $maxFloat;

  private $decimals;

  public function __construct(int $size, $minFloat = 0, $maxFloat = 100, $decimals = 5) {
    $this->arr = [];
    $this->size = $size;
    $this->minFloat = $minFloat;
    $this->maxFloat = $maxFloat;
    $this->decimals = $decimals;
  }

  public function run() {
    for ($i = 0; $i < $this->size; $i++) {
      $this->arr[$i] = frand($this->minFloat, $this->maxFloat, $this->decimals);
    }
  }
}

?>
