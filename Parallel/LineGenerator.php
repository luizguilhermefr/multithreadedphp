<?php

include_once __DIR__."/../generics.php";

class LineGenerator extends Thread {

  private $size;

  private $arr;

  public function __construct(int $size, &$arr) {
    $this->size = $size;
    $this->arr = $arr;
  }

  public function run() {
    for ($i = 0; $i < $this->size; $i++) {
      $this->arr[] = frand($min_float, $max_float, $decimals);
    }
  }
}

?>
