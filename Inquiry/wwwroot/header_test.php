<?php

//buffering for header to come out
ob_start();

//waiting time
sleep(2);

//
echo 'test';
//change to the location
header('Location:http://google.com');

?>