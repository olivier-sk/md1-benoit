test
<style>
    div.warning{color:red;background:orange}
    div.alert{color:white;background:red}
    div.info{color:blue;background:lightblue}
</style>
<?php
require_once '../vendor/autoload.php' ;

use testPhpUnit\Person ;
use librairy\ServiceContainer ;
use librairy\Logger ;

//$person = new Person('Marcel', 'Lupin', ['8 avenue Garennière',94260,'fresnes']);
//var_dump($person);

$serviceContainer = new ServiceContainer() ;
$serviceContainer->setService('logger', new Logger()) ;
/* @var Logger $logger */
$logger = $serviceContainer->getService('logger') ;
//echo $logger->doEcho ('Message<br>', 'blue') ;
//echo $logger->doEcho ('toto<br>', 'red') ;
echo $logger->log ('warning','warning') ;
$logger->log('info', 'info') ;
$logger->alert("alert!!!");
