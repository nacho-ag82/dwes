<?php

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use composer\test;
use composer\test\Test as TestTest;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('C:\Users\DAW_M\Desktop\mananas\dwes\composer\test-composer\your.log', Level::Warning));


// add records to the log
$log->warning('Foo');
$log->error('Bar');

?>