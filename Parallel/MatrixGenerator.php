<?php

include_once "Parallel/LineGenerator.php";

class MatrixGenerator {

  public static function generate(int $size, int $threadCount) {
    $matrix = [];
    $threads = [];

    for ($i = 0; $i < $threadCount; $i++) {
      $threads[$i] = new LineGenerator($size);
    }

    for ($i = 0; $i < $size; $i++) {
      $index = $i % $threadCount;
      $id = $threads[$index]->pushWork();
      $threads[$index]->arr[$id] = [];
    }

    for ($i = 0; $i < $threadCount; $i++) {
      $threads[$i]->start();
    }

    for ($i = 0; $i < $size; $i++) {
      $index = $i % $threadCount;
      if (!$threads[$index]->isJoined()) {
        $threads[$index]->join();
      }
      $matrix[$index] = $threads[$i % $threadCount]->nextResult();
    }

    return $matrix;
  }

}

?>
