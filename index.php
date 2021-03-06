<?php
require 'inc/lib_useragent.php';
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

$ua = useragent_decode($client_useragent);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>StarterPage</title>
    <meta name="description" content="StarterPage by Jan Jastrow - for personal use only." />
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link type="text/css" rel="stylesheet" href="css/blacktie.css" />
    <link href='http://fonts.googleapis.com/css?family=Exo+2:700|Titillium+Web:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
    <nav class="navigation">
        <ul>
            <li><a href="#">Search</a></li>
            <li><a href="#">Show IP</a></li>
            <li><a href="#">About</a></li>
        </ul>
    </nav>
    <input type="checkbox" id="nav-trigger" class="nav-trigger" />
    <label for="nav-trigger" title="Menu"></label>
    <div class="wrapper">
        <header>
            <h1>Tools.Jastrow.me</h1>
        </header>
        <div class="main" rel="main">
            <article class="client_ip_block">
                <p class="client_ip_text">Your public IP:</p>
                <p class="client_ip"><?= $client_ip ?></p>
            </article>
            <article class="client_data_block">
                <table>
                    <tr>
                        <td>OS:</td>
                        <td><?= $ua['os']." ".$ua['os_version'] ?></td>
                    </tr>
                    <tr>
                        <td>Browser:</td>
                        <td class="tt_cap">
                        <?php
                        if ($ua['agent']." ".$ua['agent_version'] == $ua['engine']." ".$ua['engine_version']) {
                            echo $ua['agent']." ".$ua['agent_version'];
                        } else {
                            echo $ua['agent']." ".$ua['agent_version']." (".$ua['engine']." ".$ua['engine_version'].")";
                        }
                        ?>
                        </td>
                    </tr>
                </table>
            </article>
            <article class="">
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.

Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.

Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.

Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.

Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.

At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.

Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus.

Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.

Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.

Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
            </article>
        </div>
        <footer>
            <p>Created with ♡ at <a href="https://schwerkraftlabor.de">Schwerkraftlabor</a></p>
        </footer>
    </div>
</body>
</html>
