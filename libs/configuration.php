<?php
//configuration

require 'libs/Config.php';

$config = Config::singleton();
$config->set('controllerFolder', 'business/');
$config->set('modelFolder', 'domain/');
$config->set('viewFolder', 'view/');

$config->set('dbhost', '163.178.107.10');
$config->set('dbname', 'bdreservacabana');
$config->set('dbuser', 'laboratorios');
$config->set('dbpass', 'UCRSA.118');

?>