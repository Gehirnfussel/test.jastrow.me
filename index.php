<?php
/*
-=| Get the IP
*/
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $client_ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $client_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $client_ip = $_SERVER['REMOTE_ADDR'];
}

/*
-=| Request over TLS?
*/
if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on') {
    $client_ssl = "unencrypted";
} else {
    $client_ssl = "encrypted";
}

/*
-=| Referer
*/
if(isset($_SERVER['HTTP_REFERER'])) {
    $client_referer = $_SERVER['HTTP_REFERER'];
} else {
    $client_referer = 'unknown';
}

/*
-=| Get the other data
*/
$client_remote_port = $_SERVER['REMOTE_PORT']; // Example: 64051
$client_useragent = $_SERVER['HTTP_USER_AGENT']; // Example: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.61 Safari/537.36
$client_accept = $_SERVER['HTTP_ACCEPT']; // Example: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8
$client_language = $_SERVER['HTTP_ACCEPT_LANGUAGE']; // Example: en,de-DE;q=0.8,de;q=0.6,en-US;q=0.4
$client_accept_encoding = $_SERVER['HTTP_ACCEPT_ENCODING']; // Example: gzip, deflate, sdch
$client_request_method = $_SERVER['REQUEST_METHOD']; // Example: GET
$client_connection = $_SERVER['HTTP_CONNECTION']; // Example: keep-alive
$server_ip = $_SERVER['SERVER_ADDR']; // Example: 92.51.134.136
$server_port = $_SERVER['SERVER_PORT']; // Example: 443
$server_protocol = $_SERVER['SERVER_PROTOCOL']; // Example: HTTP/1.1
$server_name = $_SERVER['SERVER_NAME']; // Example: localhost
$server_requesttime = $_SERVER['REQUEST_TIME']; // Example: $UnixTimeStamp
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ConnectionTest</title>
    <meta name="description" content="Check for your WAN IP and other browser/server variables." />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link type="text/css" rel="stylesheet" href="/blacktie.css" />
</head>
<body>
    <header>
        <h1>Connection Test</h1>
    </header>
<h1><?= $client_ip ?></h1>
<br />
<a href="ip.php">Reload</a>
</body>
</html>
