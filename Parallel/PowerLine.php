<?php

include_once __DIR__."/../generics.php";

class PowerLine extends Thread {

  public $arr;

  private $expoent;

  public function __construct($arr, float $expoent = 2.0) {
    $this->arr = $arr;
    $this->expoent = $expoent;
  }

  public function run() {
    for ($i = 0; $i < count($this->arr); $i++) {
      $this->arr[$i] = pow($this->arr[$i], $this->expoent);
    }
  }
}

?>
