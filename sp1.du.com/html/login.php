<?php   

require_once('../simplesamlphp/lib/_autoload.php');

$auth = new \SimpleSAML\Auth\Simple('sp1.du.com');

if (!$auth->isAuthenticated()) {
    /* Show login link. */
    header("Location: /login.php");
}
//sleep(60);


$auth->requireAuth([
    'ReturnTo' => 'https://sp1.du.com/' .$_GET['service'] .'.php',
    'KeepPost' => FALSE,
]);

$attributes = $auth->getAttributes();
print_r($attributes);

// phpinfo();



?>
