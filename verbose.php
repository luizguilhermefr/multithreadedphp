<?php

function print_matrixes(array $m1, array $m2, string $title1 = 'M1', string $title2 = 'M2') {
  print_matrix($m1, $title1);
  print_matrix($m2, $title2);
}

function print_matrix(array $matrix, string $title = 'M') {
  echo "{$title}:\n";
  print_r($matrix);
  echo "\n";
}

function print_double(float $val, string $title = 'Value') {
  echo "\n{$title}:\n";
  print_r($val);
  echo "\n";
}

function print_time(float $start, float $end) {
  $diff = $end - $start;
  echo "Time elapsed: {$diff}s\n";
}

?>
