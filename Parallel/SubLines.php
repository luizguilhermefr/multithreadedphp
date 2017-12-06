<?php

class SubLines extends Thread {

  public $arr;

  private $line1;

  private $line2;

  private $worksL1 = [];

  private $worksL2 = [];

  private $lastResultGiven = -1;

  public $queueCount = 0;

  public function __construct() {
    $this->arr = [];
  }

  public function nextResult() {
    $this->lastResultGiven++;
    return $this->arr[$this->lastResultGiven];
  }

  public function resetNextResult() {
    $this->lastResultGiven = -1;
  }

  public function pushWork($l1, $l2) {
    $identifier = $this->queueCount;
    $this->queueCount++;
    $this->worksL1[$identifier] = $l1;
    $this->worksL2[$identifier] = $l2;
    return $identifier;
  }

  public function run() {
    $i = 0;
    while ($this->queueCount) {
      for ($j = 0; $j < count($this->worksL1[$i]); $j++) {
        $this->arr[$i][$j] = $this->worksL1[$i][$j] - $this->worksL2[$i][$j];
      }
      $this->queueCount--;
      $i++;
    }
  }
}

?>
