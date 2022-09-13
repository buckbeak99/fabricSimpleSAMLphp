<?php
namespace SimpleSAML\Module\fabricModule\Auth\Source;
//include_once __DIR__ . '../../server.php';
use Exception;
use PDO;
use PDOException;
use SimpleSAML\Error;
use SimpleSAML\Logger;
class fabricAuth extends \SimpleSAML\Module\core\Auth\UserPassBase {

    /* The database DSN.
        * See the documentation for the various database drivers for information about the syntax:
        *     http://www.php.net/manual/en/pdo.drivers.php
        */
     //private $dsn;
     // The database username, password & option
     private $username;
     private $password;
    // private $options;

     public function __construct($info, $config){
         parent::__construct($info, $config);

        //  if(!is_string($config['dsn'])){
        //      throw new \SimpleSAML\Error\Exception('Missing or invalid dsn option in config.');
        //  }
        //  $this->dsn = $config['dsn'];

         if(!is_string($config['username'])){
             throw new \SimpleSAML\Error\Exception('Missing or invalid username option in config.');
         }
         $this->username = $config['username'];

         if(!is_string($config['password'])){
             throw new \SimpleSAML\Error\Exception('Missing or invalid password option in config.'); 
         }
         $this->password = $config['password'];

        //  if((isset($config['options']))){
        //      if(!is_array($config['options'])){
        //          throw new \SimpleSAML\Error\Exception('Missing or invalid options option in config.');
        //      }
        //      $this->options = $config['options'];
        //  }
         
     }
      /**
        * A helper function for validating a password hash.
        *
        * In this example we check a SSHA-password, where the database
        * contains a base64 encoded byte string, where the first 20 bytes
        * from the byte string is the SHA1 sum, and the remaining bytes is
        * the salt.
        */
    //  private function checkPassword($passwordHash, $password){
    //      $passwordHash = base64_decode($passwordHash);
    //      $digest = substr($passwordHash, 0, 20);
    //      $salt = substr($passwordHash, 20);

    //      $checkDigest = sha1($password, $salt, TRUE);
    //      return $digest === $checkDigest;
    //  }

     protected function login($username, $password){
         // Connect to the database
        //  $db = new PDO($this->dsn, $this->username, $this->password, $this->options);
        //  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //  /* Ensure that we are operating with UTF-8 encoding.
        //     * This command is for MySQL. Other databases may need different commands.
        //     */
        //  $db->exec("SET NAMES 'utf8'");

        //  /* With PDO we use prepared statements. This saves us from having to escape
        //      * the username in the database query.
        //      */
       
        
        //  $st = $db->prepare('SELECT uid, userName, email, eduPersonPrincipalName FROM users WHERE uid = :username AND AES_DECRYPT(password,"MyNewPass5!") = :password');

        //  $st->execute(array(":username" => $username, ":password" => $password));


        //  if(!$st->execute([':username'=>$username,':password'=>$password])){
        //      throw new \SimpleSAML\Error\Exception('Failed to query database for user.');
             
        //  }
        // //  //$st->bind_result($username);
        // //  // Retrieve the row from the database.
        //   $row = $st->fetch(PDO::FETCH_ASSOC);
        //  if(!row){
        //      // user not found
        //      SimpleSAML\Logger::warning('fabricAuth: Could not find user ' . var_export($username, TRUE) . '.');
        //    throw new \SimpleSAML\Error\Exception('Failed to query database for user.');
        //   // $stmt->bindParam('uid', $username, PDO::PARAM_STR);
        //  }

         // check the password
        //  if(!$row[':password']){
        //      // invalid password
        //      SimpleSAML\Logger::warning('fabricAuth: Wrong password for user ' . var_export($username, TRUE) . '.');
        //      throw new \SimpleSAML\Error\Error('WRONGUSERPASS');
        //  }

         // Create the attribute array of the user.
      
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