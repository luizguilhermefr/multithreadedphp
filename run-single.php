<?php

include_once "sync_generators.php";
include_once "sync_math.php";
include_once "verbose.php";

function print_invalid_arguments() {
  echo "Invalid arguments!\n";
  echo "Usage:\n";
  echo "php -f run-single.php [matrix size] [--verbose]\n";
}

function parse_commands(array $arguments) {
  global $verbose, $size;
  if (!((count($arguments) >= 2) && intval($arguments[1]))) {
    print_invalid_arguments();
    die(1);
  }

  $verbose = count($arguments) >= 3 ? $arguments[2] == '--verbose' : false;
  $size = intval($arguments[1]);
}

ini_set('memory_limit', '-1');

$verbose = false;

$size = 0;

parse_commands($argv);

$time_start = microtime(true);

$m1 = generate_matrix($size);

$m2 = generate_matrix($size);

if ($verbose) {
  print_matrixes($m1, $m2);
}

$m1 = square($m1);

$m2 = square($m2);

if ($verbose) {
  print_matrixes($m1, $m2, 'M1²', 'M2²');
}

$m3 = sub($m1, $m2);

if ($verbose) {
  print_matrix($m3, 'M1² - M2²');
}

$sum = diff_sum($m3);

$time_end = microtime(true);

if ($verbose) {
  print_double($sum, 'Sum of differences');
  echo "\n";
}

print_time($time_start, $time_end);

?>
