<?php

include_once "Parallel/PowerLine.php";
include_once "Parallel/SubLine.php";

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

  public static function sub(array $m1, array $m2, int $threadCount) {
    $threads = [];
    $matrixResult = [];

    for ($i = 0; $i < count($m1); $i++) {
      $threads[$i] = new SubLine($m1[$i], $m2[$i]);
      $threads[$i]->start();
    }

    for ($i = 0; $i < count($m1); $i++) {
      $threads[$i]->join();
      $matrixResult[$i] = $threads[$i]->result;
    }

    return $matrixResult;
  }

}

?>
