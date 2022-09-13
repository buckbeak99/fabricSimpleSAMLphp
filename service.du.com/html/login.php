<?php   

require_once('../simplesamlphp/lib/_autoload.php');

$auth = new \SimpleSAML\Auth\Simple('default-sp');

if (!$auth->isAuthenticated()) {
    /* Show login link. */
    header("Location: /login.php");
}

$auth->requireAuth([
    'ReturnTo' => 'https://service.du.com/' .$_GET['service'] .'student.php',
    'KeepPost' => FALSE,
]);

$attributes = $auth->getAttributes();
print_r($attributes);


// phpinfo();



?>