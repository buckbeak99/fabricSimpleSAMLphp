<?php   
require_once('../simplesamlphp/lib/_autoload.php');
$auth = new \SimpleSAML\Auth\Simple('sp2.du.com');
$auth->logout('https://sp2.du.com');
SimpleSAML_Session::getSessionFromRequest()->cleanup();
?>