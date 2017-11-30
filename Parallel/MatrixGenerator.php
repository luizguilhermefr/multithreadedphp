<?php

include_once "Parallel/LineGenerator.php";

class MatrixGenerator {

  public static function generate(int $size, int $threads) {
    $matrix = [];
    $threads = [];

    for ($i = 0; $i < $size; $i++) {
      $threads[$i] = new LineGenerator($size, $matrix[$i]);
      $threads[$i]->start();
    }

    for ($i = 0; $i < $size; $i++) {
      $threads[$i]->join();
    }

    return $matrix;
  }

}

?>
