<?php

function frand($min, $max, $decimals = 0) {
  $scale = pow(10, $decimals);
  return mt_rand($min * $scale, $max * $scale) / $scale;
}

function generate_matrix($size, $min_float = 0, $max_float = 100, $decimals = 5) {
  $mat = [];
  for ($i = 0; $i < $size; $i++) {
    for ($j = 0; $j < $size; $j++) {
      $mat[$i][$j] = frand($min_float, $max_float, $decimals);
    }
  }

  return $mat;
}

?>
