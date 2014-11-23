<?php

$a = 'http://172.30.14.27:44455/sapcprovision?sender=94300034&text=99200197%20D1&type=sms';
$b = 'http://172.30.14.27:44455/sapcprovision?sender=94300046&text=95061030%20250MB&type=sms';
$c = 'http://172.30.14.27:44455/sapcprovision?sender=94300086&text=95062038%20500MB&type=sms';
$d = 'http://172.30.14.27:44455/sapcprovision?sender=94300118&text=99079737%201GB&type=sms';

echo file_get_contents($a);
echo file_get_contents($b);
echo file_get_contents($c);
echo file_get_contents($d);
echo 'OK'; 
