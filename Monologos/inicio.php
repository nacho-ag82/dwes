<?php
require_once __DIR__ . '/vendor/autoload.php';

use DawM\Src\HolaMonolog;
$log = new HolaMonolog(10);
$log->despedir();
$log->saludar();

?>