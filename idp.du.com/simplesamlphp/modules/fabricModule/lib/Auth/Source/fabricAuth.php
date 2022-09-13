<?php
namespace SimpleSAML\Module\fabricModule\Auth\Source;
//include_once __DIR__ . '../../server.php';
use Exception;
use PDO;
use PDOException;
use SimpleSAML\Error;
use SimpleSAML\Logger;
class fabricAuth extends \SimpleSAML\Module\core\Auth\UserPassBase {

     private $username;
     private $password;
    

     public function __construct($info, $config){
         parent::__construct($info, $config);

         if(!is_string($config['username'])){
             throw new \SimpleSAML\Error\Exception('Missing or invalid username option in config.');
         }
         $this->username = $config['username'];

         if(!is_string($config['password'])){
             throw new \SimpleSAML\Error\Exception('Missing or invalid password option in config.'); 
         }
         $this->password = $config['password'];
         
     }

     protected function login($username, $password){
    
        // Connect to the api
         // Create the attribute array of the user.
      // here we use a fake api for testing purpose
         $url = "https://reqres.in/api/login";
        $data_array = array(
            //'uin' => urlencode(),
            // 'username' => 'eve.holt@reqres.in',
            // 'password' => 'cityslicka'
            'username'=> $username,
            'password' =>$password,
        );
        // $data_string = '';
        // foreach ($data_array as $key => $value) {
        //     $data_string .= $key . '=' . $value . '&';
        // }
        // rtrim($data_string, '&');
        $data = http_build_query($data_array);
        //print_r($data);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, $true);
        $resp = curl_exec($curl);
        $decoded = "test";

        if($er == curl_error($curl)){
            echo $er;
        }
        
        else{
            $decoded = json_decode($resp, true);
            foreach($decoded as $key => $value){
                echo $key . ':' . $value . '<br>';
                echo "<script>console.log('Debug Objects: " . $value . "' );</script>";
                print_r($decoded);
            }
            
        }
        curl_close($curl);
        

        // if ($resp == 'Success' ) {
        //     // echo $spentityid;
        //     // print_r($resp);
        //     $attributes =[
        //      'username'=> [$username],
        //     // 'displayName'=>[$row['userName']],
        //     // 'email'=>[$row['email']],
        //     //  'eduPersonAffiliation'=>[$row['eduPersonPrincipleName']],
        //  ];
        //  return $attributes;
        // } else {
        //     return $resp;
        //     print_r($resp);
        // }

        // set your attribute array according to you
         $attributes =[
             'username'=> [$username],
            'displayName'=>[$username],
            'email'=>[$username],
             'eduPersonAffiliation'=>[$username],
         ];
         // return the attributes
         
         echo $attributes;
         //sleep(60);
         return $attributes;
         //print_r($username);
     }
    }

?>