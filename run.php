<?php

include_once "verbose.php";
include_once "Parallel/LineGenerator.php";
include_once "Parallel/MatrixGenerator.php";

function print_invalid_arguments() {
  echo "Invalid arguments!\n";
  echo "Usage:\n";
  echo "php -f run.php [matrix size] [threads count] [--verbose]\n";
}

function parse_commands(array $arguments) {
  global $verbose, $size, $threads;
  if (!((count($arguments) >= 3) && intval($arguments[1]) && intval($arguments[2]))) {
    print_invalid_arguments();
    die(1);
  }

  $verbose = count($arguments) >= 4 ? $arguments[3] == '--verbose' : false;
  $size = intval($arguments[1]);
  $threads = intval($arguments[2]);
}

$verbose = false;

$size = 0;

$threads = 1;

parse_commands($argv);

$time_start = microtime(true);

$m1 = MatrixGenerator::generate($size, $threads);

$m2 = MatrixGenerator::generate($size, $threads);

if ($verbose) {
  print_matrixes($m1, $m2);
}
//
// $m1 = square($m1);
//
// $m2 = square($m2);
//
// if ($verbose) {
//   print_matrixes($m1, $m2, 'M1²', 'M2²');
// }
//
// $m3 = sub($m1, $m2);
//
// if ($verbose) {
//   print_matrix($m3, 'M1² - M2²');
// }
//
// $sum = diff_sum($m3);
//
// $time_end = microtime(true);
//
// if ($verbose) {
//   print_double($sum, 'Sum of differences');
//   echo "\n";
// }
//
// print_time($time_start, $time_end);

?>
