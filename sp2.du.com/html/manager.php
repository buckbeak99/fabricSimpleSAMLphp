<?php
require_once('../simplesamlphp/lib/_autoload.php');

$auth = new \SimpleSAML\Auth\Simple('sp2.du.com');

if (!$auth->isAuthenticated()) {
    /* Show login link. */
    header("Location: /login.php?service=manager");
} else {
    $attrs = $auth->getAttributes();
    print_r($attrs);
}
?>

