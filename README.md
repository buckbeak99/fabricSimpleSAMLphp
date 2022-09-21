# fabricSimpleSAMLphp
**A custom authentication module with authentication source that will help to establish a connection between SimpleSAMLPHP and Hyperledger Fabric** 

SimpleSAMLphp is an open-source PHP authentication application that provides support for SAML 2.0 as a Service Provider (SP) or Identity Provider (IdP).

SAML (Security Assertion Markup Language) is a secure XML-based communication mechanism for exchanging authentication and authorization data between organizations and applications. It’s often used to implement Web SSO (Single Sign On). This eliminates the need to maintain multiple authentication credentials across multiple organizations. Simply put, you can use one identity, like a username and password, to access multiple applications.

## Prerequisites
To continue with SimpleSAMLphp configuration, you have to these things in your device.
- Linux Operating System: Ubuntu 18.04/ Ubuntu 20.04
- Apache Web Server: [Securing Apache Web Server](https://github.com/buckbeak99/Securing-Apache-Server)
- PHP 
- SimpleSAMLphp: [SimpleSAMLphp installation and configuration](https://github.com/buckbeak99/SimpleSAMLphp-Installation-Configuration)
- Hyperledger Fabric: [Hyperledger Fabric Read the docs](https://hyperledger-fabric.readthedocs.io/en/release-2.2/)  

![Linux](https://img.shields.io/badge/linux-%FCC624.svg?style=for-the-badge&logo=linux&logoColor=black&color=FCC624)
![Hyperledger Fabric](https://img.shields.io/badge/hyperledger_fabric-2F3134?style=for-the-badge&logo=hyperledger&logoColor=white)
![Apache](https://img.shields.io/badge/apache-%23D42029.svg?style=for-the-badge&logo=apache&logoColor=white)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)

## Implementing custom authentication module

To start working with this module, we have to install the **Prerequisites**. Once we have done with it, our macheine is on!  

Now, follow [Securing Apache Web Server](https://github.com/buckbeak99/Securing-Apache-Server) to setup apache initials. After that, please move to 
[SimpleSAMLphp installation and configuration](https://github.com/buckbeak99/SimpleSAMLphp-Installation-Configuration) for completing the initial set up for SimpleSAMLphp.

**Make sure, you don't miss any steps during the setup**

For our task, we'll make two SP and one IDP.
Our primary concern will now only be IDP following the metadata exchange between sp and IDP.
An instruction manual for building a unique username/password authentication source for SimpleSAMLphp is provided here.
The task of authenticating the user falls on an authentication source, which normally does so by obtaining the user's login and password and checking it against a database.
Here, we will test our custom module using the MySQL database so that we can determine its functionality.   

### Create a custom module
 A module should contain all of the customized code for SimpleSAMLphp.
By doing this, you can upgrade your SimpleSAMLphp installation without wiping out your own code. 
We'll use the name `custommodule` for the module in this example. It will be found in the `modules/custommodule` section.
First we need to create the module directory:   
```bash
cd modules
mkdir customModule
```
Since this is a custom module, it should always be enabled. 
Therefore we create a default-enable file in the module. We do that by copying the 'default-enable' file from the core module. 
```bash
cd customModule
sudo cp ./simplesamlphp/modules/core/default-enable .
```
 Now that we have our own module, we can move on to creating an authentication source.
 
 ###  Configuring our authentication source
 Before we can test our authentication source, we must add an entry for it in `config/authsources.php` . `config/authsources.php` contains an list of enabled authentication sources. 
 The entry looks like this: 
 You can add it to the beginning of the list, so that the file looks something like this: 
 ```bash
<?php
  $config = [
      'myauthinstance' => [
          'customModule:customAuth',
      ],
      /* Other authentication sources follow. */
  ],
 ```
  `myauthinstance` is the name of this instance of the authentication source. (You are allowed to have multiple instances of an authentication source with different configuration.) The instance name is used to refer to this authentication source in other configuration files.

The first element of the configuration of the authentication source must be `'customModule:customAuth'` . This tells SimpleSAMLphp to look for the `\SimpleSAML\Module\mymodule\Auth\Source\MyAuth` class. 

### Using our authentication source in an IdP 
To use our new authentication source in an IdP we just need to update the IdP configuration to use it. Open `metadata/saml20-idp-hosted.php` . In that file you should locate the `auth` -option for your IdP, and change it to `myauthinstance` : 
```bash
  <?php
  /* ... */
  $metadata['__DYNAMIC:1__'] = [
      /* ... */
      /*
       * Authentication source to use. Must be one that is configured in
       * 'config/authsources.php'.
       */
      'auth' => 'myauthinstance',
      /* ... */
  ];
```
### Adding configuration to our authentication source 
Instead of hardcoding options in our authentication source, they should be configurable. We are now going to extend our authentication source to allow us to configure the username and password in `config/authsources.php`. 
```bash
'myauthinstance' => [
      'customModule:customAuth',
      'username' => '', // it will be blank if you use an api.
      'password' => '',
  ],
```
If you use MySQL database, then it should be like this:
  ```bash
  'myauthinstance'=>[
     'customModule:customAuth',
     'dsn'=> 'mysql:host=localhost;port=3306;dbname=your_database_name',
     'username'=>'your_database_username',
     'password'=>'your_database_password',
  ```  
Enable the module in `config/config.php` file;  

```bash
'module.enable' => [
         'exampleauth' => true,
         'core' => true,
         'saml' => true,
         'sqlauth'=> true,
         // custom module enable
         'customModule'=>true,
         'customAuth'=> true,
     ]
  ```  
  ## Custom Authentication
  In the customModule directory create three consequtive directories:
  ```bash
  mkdir lib/Auth/Source
  ```
  Now go to the source directory, and create a php file like this:
  ```bash
  cd /lib/Auth/Source
  touch customAuth.php
  ```
  Here we will write two sample code. 
  ### For MySQL
  ```bash
 <?php
namespace SimpleSAML\Module\customModule\Auth\Source;
use Exception;
use PDO;
use PDOException;
use SimpleSAML\Error;
use SimpleSAML\Logger;
class customAuth extends \SimpleSAML\Module\core\Auth\UserPassBase {

     private $dsn;
     // The database username, password & option
     private $username;
     private $password;
     private $options;

     public function __construct($info, $config){
         parent::__construct($info, $config);

         if(!is_string($config['dsn'])){
             throw new \SimpleSAML\Error\Exception('Missing or invalid dsn option in config.');
         }
         $this->dsn = $config['dsn'];

         if(!is_string($config['username'])){
             throw new \SimpleSAML\Error\Exception('Missing or invalid username option in config.');
         }
         $this->username = $config['username'];

         if(!is_string($config['password'])){
             throw new \SimpleSAML\Error\Exception('Missing or invalid password option in config.'); 
         }
         $this->password = $config['password'];

         if((isset($config['options']))){
             if(!is_array($config['options'])){
                 throw new \SimpleSAML\Error\Exception('Missing or invalid options option in config.');
             }
             $this->options = $config['options'];
         }
         
     }

     protected function login($username, $password){
         // Connect to the database
         $db = new PDO($this->dsn, $this->username, $this->password, $this->options);
         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         /* Ensure that we are operating with UTF-8 encoding.
            * This command is for MySQL. Other databases may need different commands.
            */
         $db->exec("SET NAMES 'utf8'");

         /* With PDO we use prepared statements. This saves us from having to escape
             * the username in the database query.
             */
         $st = $db->prepare('SELECT uid, userName, email, eduPersonPrincipalName FROM users WHERE uid = :username AND     AES_DECRYPT(password,"MyNewPass5!") = :password');

         $st->execute(array(":username" => $username, ":password" => $password));

         if(!$st->execute([':username'=>$username,':password'=>$password])){
             throw new \SimpleSAML\Error\Exception('Failed to query database for user.');
         }
        //  // Retrieve the row from the database.
          $row = $st->fetch(PDO::FETCH_ASSOC);
         if(!row){
             // user not found
             SimpleSAML\Logger::warning('fabricAuth: Could not find user ' . var_export($username, TRUE) . '.');
           throw new \SimpleSAML\Error\Exception('Failed to query database for user.');
         }

         // Create the attribute array of the user.
         $attributes =[
             'username'=> [$username],
            'displayName'=>[$row['userName']],
            'email'=>[$row['email']],
             'eduPersonAffiliation'=>[$row['eduPersonPrincipleName']],
         ];
         // return the attributes
         return $attributes;
     }
    }

?>
```
Go to MySQL command line or MySQL workbench, create database, create database username, create password, insert somevalue(UID, USERNAME, EMAIL, PASSWORD, SECRETSALT, EDU PERSON Principle Name).
Query:
- log in to the MySQL root account
```bash
mysql -u root -p
```
- create database
```bash
CREATE DATABASE auth DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
```
- grant all permission to the user
```bash
GRANT ALL ON auth.* TO 'authuser'@'localhost' IDENTIFIED BY 'your_mysql_auth_user_password';
```
- create table
```bash
CREATE TABLE auth.users(username VARCHAR(30), password VARBINARY(30), email VARCHAR(30), edupersonprinciplename VARCHAR(30));
```
- insert value
```bash
INSERT INTO auth.users(username, password, email, edupersonprinciplename) VALUES
('user1', AES_ENCRYPT('user1pass','your_secret_key'), 'email', 'employee'),
('user2', AES_ENCRYPT('user2pass','your_secret_key'), 'email', 'student'),
('user3', AES_ENCRYPT('user3pass','your_secret_key'), 'email', 'employee');
```
- flush privileges
```bash
FLUSH PRIVILEGES;
```
## For API
```bash
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
            'username'=> $username,
            'password' =>$password,
        );
        $data = http_build_query($data_array);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, $true);
        $resp = curl_exec($curl);
        $decoded = "test"
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
        // set your attribute array according to you
         $attributes =[
             'username'=> [$username],
            'displayName'=>[$username], // change as your wish
            'email'=>[$username], // change as your wish
             'eduPersonAffiliation'=>[$username],// change as your wish
         ];
         // return the attributes
         echo $attributes;
         //sleep(60);
         return $attributes;
         //print_r($username);
     }
    }

?>
```
You may have to change codebase or attributelist according to your need.
## Testing our authentication source
Now that we have configured the authentication source, we can test it by accessing "authentication"-page of the SimpleSAMLphp web interface. By default, the web interface can be found on http://yourhostname.com/simplesaml/ . (Obviously, "yourhostname.com" should be replaced with your real hostname.)

Then select the `Authentication`-tab, and choose `Test configured authentication sources`. You should then receive a list of authentication sources from `config/authsources.php` . Select `myauthinstance` , and log in using the username, and the password. You should then arrive on a page listing the attributes we return from the login function.

Next, you should log out by following the log out link. 

**Fake Api**: https://reqres.in/

## Screenshots
User's data in IDP's end.
![Data in idp end](https://user-images.githubusercontent.com/43216053/191090197-efb00e11-cc5d-4aff-bef7-a5a2fe952f9d.png)

User's data in SP's end
![data in sp end](https://user-images.githubusercontent.com/43216053/191090236-4c3bb986-8564-4160-815f-28a8eaf65e6e.png)



