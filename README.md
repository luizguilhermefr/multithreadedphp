# Multi Threaded PHP

An example of multi threading with PHP CLI using matrix operations.

## Pre-requisites

Install PHP 7.0 CLI:

```
sudo apt-get update
sudo apt-get install php7.0-cli
```

## Running:

To run, just type in bash terminal:

```
php -f run.php [matrix size] [threads number] [--verbose]
```

For instance:

```
php -f run.php 1500 8 --verbose
```

Will run with a 1500x1500 matrix using up to 8 threads and print the result on screen (never use it, print to a file instead).

**Extra:** If you prefer to run a "clean" single-threaded version, use instead:

```
php -f run-single.php [matrix size] [--verbose]
```

For instance:

```
php -f run-single.php 500
```

Will run a 500x500 matrix using only one thread and print only the spent time on screen.
