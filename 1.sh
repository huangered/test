dd=`ifconfig eth0 | grep inet|cut -d: -f2|awk '{print $2}'`
echo $dd
php artisan serve --host=$dd -vvv
