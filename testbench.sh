printf "single/1000\n"
php -f run-single.php 1000
php -f run-single.php 1000
php -f run-single.php 1000

printf "single/5000\n"
php -f run-single.php 5000
php -f run-single.php 5000
php -f run-single.php 5000

printf "single/10000\n"
php -f run-single.php 10000 2
php -f run-single.php 10000 2
php -f run-single.php 10000 2

printf "2t/1000\n"
php -f run.php 1000 2
php -f run.php 1000 2
php -f run.php 1000 2

printf "2t/5000\n"
php -f run.php 5000 2
php -f run.php 5000 2
php -f run.php 5000 2

printf "2t/10000\n"
php -f run.php 10000 2
php -f run.php 10000 2
php -f run.php 10000 2

printf "4t/1000\n"
php -f run.php 1000 4
php -f run.php 1000 4
php -f run.php 1000 4

printf "4t/5000\n"
php -f run.php 5000 4
php -f run.php 5000 4
php -f run.php 5000 4

printf "4t/10000\n"
php -f run.php 10000 4
php -f run.php 10000 4
php -f run.php 10000 4
