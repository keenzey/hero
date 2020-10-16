<?php
//error_reporting(0);
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);
date_default_timezone_set('UTC');
header("Content-Type:text/html;charset=utf-8");
define ("BASE_title","BtrWab");
define ("BASE_title_slog","Watch free web videos");
define ("BASE_title_sep"," - ");
define ("BASE_description","Watch free web videos. Online video sharing portal, fast loading page you will not waiting too long");
define ("BASE_url","https://btrwab.herokuapp.com");
define ("BASE_disqus","xlx");

define ("BASE_bing","");
define ("BASE_yandex","");
define ("BASE_google","");

define ("BASE_ads_js","https://responsivethemesstatic.github.io/static/wp.js");

function escape($str){
    $gh = htmlspecialchars_decode ($str,ENT_QUOTES);
    return htmlspecialchars($gh, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

function escape_with_html($str){
    $gh = html_entity_decode ($str,ENT_QUOTES);
    return htmlentities($gh, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

function file_getcontent_with_proxy ($urltoget) {
    $url = $urltoget;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // read more about HTTPS 
    curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    $curl_scraped_page = curl_exec($ch);
    curl_close($ch);
    return $curl_scraped_page;
}
?>
