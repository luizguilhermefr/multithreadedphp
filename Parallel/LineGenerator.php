<?php

include_once __DIR__."/../generics.php";

class LineGenerator extends Thread {

  public $arr;

  public $queueCount = 0;

  private $size;

  private $minFloat;

  private $maxFloat;

  private $decimals;

  private $lastResultGiven = -1;

  public function __construct(int $size, float $minFloat = .0, float $maxFloat = 100.0, int $decimals = 5) {
    $this->arr = [];
    $this->size = $size;
    $this->minFloat = $minFloat;
    $this->maxFloat = $maxFloat;
    $this->decimals = $decimals;
  }

  public function nextResult() {
    $this->lastResultGiven++;
    return $this->arr[$this->lastResultGiven];
  }

  public function resetNextResult() {
    $this->lastResultGiven = -1;
  }

  public function pushWork() {
    $this->queueCount++;
    return $this->queueCount - 1; // identifier
  }

  public function run() {
    $i = 0;
    while ($this->queueCount) {
      for ($j = 0; $j < $this->size; $j++) {
        $this->arr[$i][$j] = frand($this->minFloat, $this->maxFloat, $this->decimals);
      }
      $this->queueCount--;
      $i++;
    }
  }
}

?>
