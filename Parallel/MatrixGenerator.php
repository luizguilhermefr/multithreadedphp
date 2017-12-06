<?php

include_once "Parallel/LineGenerator.php";

class MatrixGenerator {

  public static function generate(int $size, int $threadCount) {
    $matrix = [];
    $threads = [];

    for ($i = 0; $i < $size; $i++) {
      $threads[$i] = new LineGenerator($size);
      $threads[$i]->start();
    }

    for ($i = 0; $i < $size; $i++) {
      $threads[$i]->join();
      $matrix[$i] = $threads[$i]->arr;
    }

    return $matrix;
  }

}

?>
