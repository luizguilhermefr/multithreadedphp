<?php

class SumOfLine extends Thread {

  public $result;

  private $line;

  public function __construct($line) {
    $this->line = $line;
    $this->result = .0;
  }

  public function run() {
    for ($i = 0; $i < count($this->line); $i++) {
      $this->result += $this->line[$i];
    }
  }
}

?>
