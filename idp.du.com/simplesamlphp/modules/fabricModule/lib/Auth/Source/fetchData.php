<?php
namespace SimpleSAML\Module\fabricModule\Auth\Source;
//include_once __DIR__ . 'simplesamlphp/modules/fabricModule/lib/Auth/Source/server.php';
include_once __DIR__ . 'simplesamlphp/modules/fabricModule/lib/Auth/Source/fabricAuth.php';
use Exception;
use PDO;
use PDOException;
use SimpleSAML\Error;
use SimpleSAML\Logger;

class fetchData extends \SimpleSAML\Module\core\Auth\UserPassBase{

    private $username;

    function getdata($username){

        $curl = curl_init();
    // $url = get_server_url();
    $url = "https://reqres.in/api/users/2";
     curl_setopt_array($curl, [
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_URL => $url,
         CURLOPT_USERAGENT => 'Sample cURL Request'
     ]);
     $resp = curl_exec($curl);
     curl_close($curl);
     $usernamelist = json_decode($resp, true);
     //print_r($uin_list);

     $userdata = [];
     foreach ($usernamelist as $value) {

         $curl = curl_init();
         curl_setopt_array($curl, [
             CURLOPT_RETURNTRANSFER => 1,
             CURLOPT_URL => $value,
             CURLOPT_USERAGENT => 'Sample cURL Request'
         ]);
         $resp = curl_exec($curl);
        //  if ($value == get_server_url()) {
        //      echo $value;
        //  }
         if ($value == "https://reqres.in/api/users/2") {
             echo $value;
         }
         $userdata[$value] = json_decode($resp, true);
     }

     return $userdata;
    print_r($userdata);

    }


    function postdata($username, $password){

       // $url = get_server_url();
       $url = "https://reqres.in/api/login";
        $data_array = array(
            'uin' => urlencode(),
            'username' => $username,
            'password' => $password
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

        if($er == curl_error($curl)){
            echo $er;
        }
        else{
            $decoded = json_decode($resp, true);
            foreach($decoded as $key => $value){
                echo $key . ':' . $value . '<br>';
                print_r($decoded);
            }
        }
        curl_close($curl);

        if ($resp == 'Success' ) {
            // echo $spentityid;
            // print_r($resp);
            $attributes =[
             'username'=> [$username],
            // 'displayName'=>[$row['userName']],
            // 'email'=>[$row['email']],
            //  'eduPersonAffiliation'=>[$row['eduPersonPrincipleName']],
         ];
         return $attributes;
        } else {
            return $resp;
            print_r($resp);
        }

    }

}