<?php
/**
 * Use REMOTE_ADDR. If there is a load balancer in front of us, use the last
 * value. See http://stackoverflow.com/a/18517550/3250348.
 *
 * UPDATE: Looks like the answer above is not quite true in PHP. It's the first value.
 */
$PHPized_http_header = 'HTTP_X_FORWARDED_FOR';
$ipAddress = '';
if (array_key_exists($PHPized_http_header, $_SERVER)) {
	$values = explode(',', $_SERVER[$PHPized_http_header]);
    $ipAddress = $values[0];
} else {
	$ipAddress = $_SERVER['REMOTE_ADDR'];
}

print $ipAddress;

?>