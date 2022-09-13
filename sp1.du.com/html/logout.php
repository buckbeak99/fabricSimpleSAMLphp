
<?php   
require_once('../simplesamlphp/lib/_autoload.php');
$auth = new \SimpleSAML\Auth\Simple('sp1.du.com');
$auth->logout('https://sp1.du.com');
?>
