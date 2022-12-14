<?php

include_once __DIR__ . '/consts.php';

function reportMetaDataFor($spentityid, $idpentityid, $idpcode)
{
    $fields = array(
        'idpcode' => urlencode($idpcode),
        'spentityid' => urlencode($spentityid),
        'idpentityid' => urlencode($idpentityid),
        'report' => 'report'
    );
    $fields_string = '';
    foreach ($fields as $key => $value) {
        $fields_string .= $key . '=' . $value . '&&';
    }
    rtrim($fields_string, '&&');
    echo $fields_string;
    header("Location: $idpentityid?$fields_string");
}
function postMetaDataFor($spentityid, $idpentityid, $idpcode, $title, $fabricAuth = false)
{
    $fields = array(
        'entityId' => urlencode(get_host_name()),
        'tal' => urlencode($idpentityid),
    );
    $fields_string = '';
    foreach ($fields as $key => $value) {
        $fields_string .= $key . '=' . $value . '&';
    }
    rtrim($fields_string, '&');

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => get_post_meta_url(),
        CURLOPT_POST => count($fields),
        CURLOPT_POSTFIELDS => $fields_string
    ]);
    $resp = curl_exec($curl);
    curl_close($curl);

    if ($resp == 'Success' && $fabricAuth) {
        reportMetaDataFor($spentityid, $idpentityid, $idpcode);
    } else {
        return $resp;
    }
}

function gettMetaDataFor($title)
{
    echo get_host_name() . ": GET Metadata";

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => get_meta_url(),
        CURLOPT_USERAGENT => 'Sample cURL Request'
    ]);
    $resp = curl_exec($curl);
    curl_close($curl);
    $meta_list = json_decode($resp, true);

    $metadata = [];
    foreach ($meta_list as $value) {

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $value,
            CURLOPT_USERAGENT => 'Sample cURL Request'
        ]);
        $resp = curl_exec($curl);
        if ($value == 'http://18.191.122.156:3000/mailmetadata') {
            $value = "https://mail.service.com/service/extension/samlreceiver";
        }
        $metadata[$value] = json_decode($resp, true);
    }

    return $metadata;
}

function postCodeFor($spentityid, $idpentityid, $idpcode)
{
    $fields = array(
        'idpcode' => urlencode($idpcode),
        'spentityid' => urlencode($spentityid),
        'idpentityid' => urlencode($idpentityid),
        'fabricAuth' => 'fabricAuth'
    );
    $fields_string = '';
    foreach ($fields as $key => $value) {
        $fields_string .= $key . '=' . $value . '&';
    }
    rtrim($fields_string, '&');

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => get_store_code_url(),
        CURLOPT_POST => count($fields),
        CURLOPT_POSTFIELDS => $fields_string
    ]);
    $resp = curl_exec($curl);
    curl_close($curl);

    if ($resp == 'Success') {
        $fields_string = "";
        foreach ($fields as $key => $value) {
            $fields_string .= $key . '=' . $value . '&&';
        }
        rtrim($fields_string, '&&');
        echo $fields_string;
        header("Location: $spentityid?$fields_string");
    }
}

function getCodeFor($spentityid, $idpentityid, $idpcode)
{
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => get_code_url() . "spentityid=$spentityid&&idpentityid=$idpentityid",
        CURLOPT_USERAGENT => 'Sample cURL Request'
    ]);
    $resp = curl_exec($curl);
    curl_close($curl);
    return $resp;
}