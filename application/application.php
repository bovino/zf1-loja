<?php
$paths = array(
    realpath(dirname(__FILE__) . '/../library'),
    '.',
);
set_include_path(implode(PATH_SEPARATOR, $paths));

defined('APPLICATION_PATH')
    or define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));
defined('APPLICATION_ENV')
    or define('APPLICATION_ENV', 'development');

require_once 'Zend/Loader/Autoloader.php';
require_once 'Zend/Application.php';

$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH.'/config/store.ini'
);
$application->bootstrap();
$application->run();