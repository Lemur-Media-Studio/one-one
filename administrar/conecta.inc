<?

$host = "localhost";
$username = "oneoneco_santo";
$pass = "chloeybella050817";
$db = "oneoneco_mk";

$mysql = new mysqli($host,$username,$pass,$db);

$tabla = "$db.items";
$tabla10 = "$db.admin";

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>