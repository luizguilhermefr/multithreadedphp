<?php

class PowerLine extends Thread {

  public $arr;

  private $expoent;

  public $queueCount = 0;

  private $lastResultGiven = -1;

  private $works = [];

  public function __construct(float $expoent = 2.0) {
    $this->arr = [];
    $this->expoent = $expoent;
  }

  public function nextResult() {
    $this->lastResultGiven++;
    return $this->arr[$this->lastResultGiven];
  }

  public function resetNextResult() {
    $this->lastResultGiven = -1;
  }

  public function pushWork($arr) {
    $identifier = $this->queueCount;
    $this->queueCount++;
    $this->works[$identifier] = $arr;
    return $identifier;
  }

  public function run() {
    $i = 0;
    while ($this->queueCount) {
      for ($j = 0; $j < count($this->works[$i]); $j++) {
        $this->arr[$i][$j] = pow($this->works[$i][$j], $this->expoent);
      }
      $this->queueCount--;
      $i++;
    }
  }
}

?>
