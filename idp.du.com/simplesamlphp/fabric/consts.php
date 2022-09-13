<?php
// host
function get_host_name(){
    return 'www.idp.du.com';
}
// Fabric API's ip address
function get_server_url(){
    return '';
}
function get_post_meta_url()
{
    return get_server_url() . '/storetallist';
}
function get_meta_url()
{
    return get_server_url() . '/tallistfetch?entityId=' . get_host_name();
}
function get_mail_meta_url()
{
    return get_server_url() . '/mailmetadata';
}
function get_store_code_url()
{
    return get_server_url() . '/storecode';
}
function get_code_url()
{
    return get_server_url() . '/codefetch?';
}