# Multi Threaded PHP

An example of multi threading with PHP CLI using matrix operations.

## Pre-requisites

Install PHP 7.0:

```
cd /usr/local/src
sudo wget http://br2.php.net/distributions/php-7.0.26.tar.gz
sudo tar xzf php-7.0.26.tar.gz
cd php-7.0.26.tar.gz
sudo ./configure --prefix=/usr --with-config-file-path=/etc --enable-maintainer-zts
sudo make
sudo make install
sudo cp php.ini-development /etc/php.ini
```

Install [pthreads](https://github.com/krakjoe/pthreads):

```
sudo apt-get install autoconf
cd /usr/local/src
sudo wget https://github.com/krakjoe/pthreads/archive/v3.1.6.tar.gz
sudo mv v3.1.6.tar.gz pthreads-v3.1.6.tar.gz
sudo tar xzf pthreads-v3.1.6.tar.gz
cd pthreads-v3.1.6
sudo ./configure
sudo make
sudo make install
sudo echo "extension=pthreads.so" >> /etc/php.ini
```

Check installation:

```
php -m | grep pthreads
```

## Running:

To run, just type in bash terminal:

```
php -f run.php [matrix size] [threads count] [--verbose]
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

## Warning

This software is for testing/scientific purposes. It will set PHP's memory limit to no-limits. Use carefully.
