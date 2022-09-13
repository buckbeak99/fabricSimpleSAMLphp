<?php
require_once('../simplesamlphp/lib/_autoload.php');
$auth = new \SimpleSAML\Auth\Simple('sp1.du.com');

if (!$auth->isAuthenticated()) {
    /* Show login link. */
    header("Location: /login.php?service=student");
} else {
    $attrs = $auth->getAttributes();
    //  echo($attrs);
    //print_r($attrs);
    // if ($attrs['eduPersonAffiliation'][1] === 'student') {
    //     echo "You are logged in";
    // // } else if($attrs['eduPersonAffiliation'][1] != 'student') {
    // //     header("Location: /test.php");
    // // }
}
?>

