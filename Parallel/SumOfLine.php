<?php

class SumOfLine extends Thread {

  public $result;

  private $line;

  private $works = [];

  public function __construct() {
    $this->result = .0;
  }

  public function pushWork($line) {
    $this->works[] = $line;
  }

  public function run() {
    for ($i = 0; $i < count($this->works); $i++) {
      for ($j = 0; $j < count($this->works[$i]); $j++) {
        $this->result += $this->works[$i][$j];
      }
    }
  }
}

?>
