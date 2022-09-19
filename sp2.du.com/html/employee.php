<?php
require_once('../simplesamlphp/lib/_autoload.php');
$auth = new \SimpleSAML\Auth\Simple('sp2.du.com');

$auth->requireAuth();

// $attributes = $as->getAttributes();
// print_r($attributes);


// $as->login([
//       'saml:idp' => 'https://idp.du.com/',
//   ]);
if (!$auth->isAuthenticated()) {
    /* Show login link. */
    header("Location: /login.php?service=employee");
} 
else {
    $attrs = $auth->getAttributes();
    //  echo($attrs);
    print_r($attrs);
}

$session = \SimpleSAML\Session::getSessionFromRequest();
$session->cleanup();
?>

