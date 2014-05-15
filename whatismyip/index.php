<?php

$http_header = 'X-Forwarded-For';
$PHPized_header = 'HTTP_X_FORWARDED_FOR';

/**
 * Use REMOTE_ADDR. If there is a load balancer in front of us, use the last
 * value. See http://stackoverflow.com/a/18517550/3250348
 */
$ipAddress = '';
if (array_key_exists($http_header, $_SERVER)) {
	$values = explode(',', $_SERVER[$PHPized_header]);
	//$ipAddress = array_reverse($values);
    $ipAddress = array_pop($values);
} else {
	$ipAddress = $_SERVER['REMOTE_ADDR'];
}

print $ipAddress;

?>