<?php
// Create connection to Oracle
$conn = oci_connect("diginet", "d1g1n3t$#", "//172.16.10.155/MAPATDA");
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   echo "failed";
   exit;
}
else {
   print "Connected to Oracle!";
}
// Close the Oracle connection
oci_close($conn);
?>
