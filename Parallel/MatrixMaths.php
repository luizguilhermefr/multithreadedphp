<?php

include_once "Parallel/PowerLine.php";

class MatrixMaths {

  public static function pow(array $matrix, int $threadCount, float $expoent = 2.0) {
    $threads = [];

    for ($i = 0; $i < count($matrix); $i++) {
      $threads[$i] = new PowerLine($matrix[$i]);
      $threads[$i]->start();
    }

    for ($i = 0; $i < count($matrix); $i++) {
      $threads[$i]->join();
      $matrix[$i] = $threads[$i]->arr;
    }

    return $matrix;
  }

}

?>
