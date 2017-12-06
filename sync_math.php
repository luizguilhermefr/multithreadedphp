<?php

function square(array $matrix) {
  for ($i = 0; $i < count($matrix); $i++) {
    for ($j = 0; $j < count($matrix[$i]); $j++) {
      $matrix[$i][$j] = pow($matrix[$i][$j], 2);
    }
  }

  return $matrix;
}

function sub(array $m1, array $m2) {
  $matrix = [];
  for ($i = 0; $i < count($m1); $i++) {
    for ($j = 0; $j < count($m1); $j++) {
      $matrix[$i][$j] = $m1[$i][$j] - $m2[$i][$j];
    }
  }

  return $matrix;
}

function diff_sum(array $matrix) {
  $sum = .0;
  for ($i = 0; $i < count($matrix); $i++) {
    for ($j = 0; $j < count($matrix[$i]); $j++) {
      $sum += $matrix[$i][$j];
    }
  }

  return $sum;
}

?>
