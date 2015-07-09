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
-=| Get the other data
*/
$client_remote_port = $_SERVER['REMOTE_PORT']; // Example: 64051
$client_useragent = $_SERVER['HTTP_USER_AGENT']; // Example: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.61 Safari/537.36
$client_referer = $_SERVER['HTTP_REFERER']; // Example: http://localhost:8080/ip.php
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

<!doctype>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>IP</title>
    <meta name="description" content="" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style media="screen">
        html {
            font-family: sans-serif; /* 1 */
            -ms-text-size-adjust: 100%; /* 2 */
            -webkit-text-size-adjust: 100%; /* 2 */
        }
        html {
            color: #222;
            font-size: 1em;
            line-height: 1.4;
        }
        body {
            font-family: monospace;
            font-size: 11pt;
        }
        a {
            color: #9f5915;
        }

    </style>
</head>
<body>
<?php
echo $client_ssl." IPv4 request"."<br />";
echo "from <a href='http://www.db.ripe.net/whois?searchtext=".$client_ip."' target='_blank'> ".$client_ip."</a>:".$client_remote_port."<br />";
echo "to <a href='http://www.db.ripe.net/whois?searchtext=".$server_ip."' target='_blank'> ".$server_ip."</a>:".$server_port." (".$server_name.")<br />";
echo "at ".date("o-m-d — H:i:s T (P)" ,$server_requesttime)."<br />";
echo "using ".$client_useragent."<br />";
echo "with ".$server_protocol." using request-method ".$client_request_method." on ".$client_connection." connection.<br />";
echo "preferring ".$client_language."<br />";
echo "while generally accepting ".$client_accept."<br />";
echo "<br />";
echo "coming from: ".$client_referer."<br />";
echo "accepting encoding: ".$client_accept_encoding."<br />";

?>
<br />
<a href="ip.php">Reload</a>
</body>
</html>
