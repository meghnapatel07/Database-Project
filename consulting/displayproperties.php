<html>
<head>
<title>Real Estate Consulting Firm</title>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<style>
  .bs-example{
    	margin: 20px;
    }
	.table {
		width:80%;
	}
	
</style>
</head>
<body>

<h1>
Property Listings
</h1>
<?php// include("dbconfig_oracle.php");
 ?>
<?php

// comment the first line and uncomment the below two lines if you are unable to include dbconfig.php file
$host = "localhost";
$user = "ora_mpate117";
$password = "oracle";
 
 $conn = oci_connect($user,$password); //The Blank string is the password
//mysqli_select_db($connection,'consulting');

$query = "SELECT property_id,property_address,city,state,zip,sqftarea,classification,description,suggested_price
FROM property NATURAL JOIN property_type ORDER by property_id"; //You don't need a ; like you do in SQL
$stid = oci_parse($conn, $query);
$r = oci_execute($stid);

echo "<div class='bs-example'>";
echo "<table class='table table-striped'>"; // start a table tag in the HTML
echo "<tr><th>Property Id</th><th>Property Address</th><th>City</th><th>State</th><th>Zip</th><th>Sq. ft. Area</th><th>Rent/Sale</th><th>Type</th><th>Price</th></td>";
while($row = oci_fetch_array($stid)){   //Creates a loop to loop through results
echo "<tr><td>" . $row[0] . "</td><td >" . $row[1] . "</td><td >" . $row[2] . "</td><td >" . $row[3] . "</td><td >" . $row[4] . "</td><td >" . $row[5] . "</td><td >" . $row[6] . "</td><td >" . $row[7] . "</td><td >" . $row[8] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML
echo "</div>";

oci_close($conn); //Make sure to close out the database connection

?>
