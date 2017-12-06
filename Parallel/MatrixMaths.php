<?php

include_once "Parallel/PowerLine.php";
include_once "Parallel/SubLines.php";
include_once "Parallel/SumOfLine.php";

class MatrixMaths {

  public static function pow(array $matrix, int $threadCount, float $expoent = 2.0) {
    $threads = [];

    for ($i = 0; $i < $threadCount; $i++) {
      $threads[$i] = new PowerLine($expoent);
    }

    for ($i = 0; $i < count($matrix); $i++) {
      $index = $i % $threadCount;
      $id = $threads[$index]->pushWork($matrix[$i]);
      $threads[$index]->arr[$id] = [];
    }

    for ($i = 0; $i < $threadCount; $i++) {
      $threads[$i]->start();
    }

    for ($i = 0; $i < count($matrix); $i++) {
      $index = $i % $threadCount;
      if (!$threads[$index]->isJoined()) {
        $threads[$index]->join();
      }
      $matrix[$index] = $threads[$index]->nextResult();
    }

    return $matrix;
  }

  public static function sub(array $m1, array $m2, int $threadCount) {
    $threads = [];
    $matrixResult = [];

    for ($i = 0; $i < count($m1); $i++) {
      $threads[$i] = new SubLines($m1[$i], $m2[$i]);
      $threads[$i]->start();
    }

    for ($i = 0; $i < count($m1); $i++) {
      $threads[$i]->join();
      $matrixResult[$i] = $threads[$i]->result;
    }

    return $matrixResult;
  }

  public static function sumAll(array $matrix, int $threadCount) {
    $threads = [];
    $result = .0;

    for ($i = 0; $i < count($matrix); $i++) {
      $threads[$i] = new SumOfLine($matrix[$i]);
      $threads[$i]->start();
    }

    for ($i = 0; $i < count($matrix); $i++) {
      $threads[$i]->join();
      $result += $threads[$i]->result;
    }

    return $result;
  }

}

?>
