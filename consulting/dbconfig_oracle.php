<?php
$host = "localhost";
$user = "ora_mpate117";
$password = "oracle";
//$database = "consulting";
$conn = oci_connect($user,$password);

if(!$conn) {
    die('No connection to oracle db: ' . oci_error());
}
	echo "Oracle Database Connection is successful";
?>
