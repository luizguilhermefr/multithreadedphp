<?php

include_once "generics.php";

function generate_matrix(int $size, float $min_float = .0, float $max_float = 100.0, int $decimals = 5) {
  $mat = [];
  for ($i = 0; $i < $size; $i++) {
    for ($j = 0; $j < $size; $j++) {
      $mat[$i][$j] = frand($min_float, $max_float, $decimals);
    }
  }

  return $mat;
}

?>
