<?php

include_once "generators.php";

function print_invalid_arguments() {
  echo "Invalid arguments!\n";
  echo "Usage:\n";
  echo "php -f run-single.php [matrix size] [--verbose]\n";
}

function parse_commands($arguments) {
  global $verbose, $size;
  if (!((count($arguments) >= 2) && intval($arguments[1]))) {
    print_invalid_arguments();
    die(1);
  }

  $verbose = count($arguments) >= 3 ? $arguments[2] == '--verbose' : false;
  $size = intval($arguments[1]);
}

$verbose = false;

$size = 0;

parse_commands($argv);

$m1 = generate_matrix($size);

$m2 = generate_matrix($size);

if ($verbose) {
  echo "M1:\n";
  print_r($m1);
  echo "\nM2:\n";
  print_r($m2);
}

?>
