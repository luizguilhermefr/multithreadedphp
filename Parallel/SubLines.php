<?php

class SubLines extends Thread {

  public $result;

  private $line1;

  private $line2;

  public function __construct($line1, $line2) {
    $this->line1 = $line1;
    $this->line2 = $line2;
    $this->result = [];
  }

  public function run() {
    for ($i = 0; $i < count($this->line1); $i++) {
      $this->result[$i] = $this->line1[$i] - $this->line2[$i];
    }
  }
}

?>
