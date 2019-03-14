
<?php
include ("DBconnection.php");


$db=new DBconnection();
$db->setDbHost("msdbhost");
$db->setDbName("databasename");
$db->setDbUser("dbusername");
$db->setDbPass("dbpass");

$conn=$db->connect();

if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

sqlsrv_query($conn, "insert into korisnici (korisnik) values ('Baltazar ".date("His")."')");
echo "query?<br>";
$result = sqlsrv_query($conn, "SELECT * FROM korisnici");

if($result === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ) {
    echo $row['korisnik']."<br />";
}
?>
