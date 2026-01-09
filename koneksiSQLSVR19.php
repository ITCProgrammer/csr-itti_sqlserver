<?php
date_default_timezone_set('Asia/Jakarta');
//$host="10.0.0.4";
//$username="timdit";
//$password="4dm1n";
//$db_name="TM";
//$connInfo = array( "Database"=>$db_name, "UID"=>$username, "PWD"=>$password);
//$conn     = sqlsrv_connect( $host, $connInfo);

$host1="10.0.0.221";
$username1="sa";
$password1="Ind@taichen2024";
$db_name1="NOWTEST";
$connInfo1 = array( "Database"=>$db_name1, "UID"=>$username1, "PWD"=>$password1);
$conn1     = sqlsrv_connect( $host1, $connInfo1);
if($conn1) {
}
else{
    exit("SQLSVR19 Connection failed");
    }

// SQL query to count the records
$sql = "SELECT COUNT(*) as count FROM DB2ADMIN.STOCKTRANSACTION";
$stmt = sqlsrv_query($conn1, $sql);

// Check if the query was successful
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Fetch the result
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

// Close the statement and connection
//sqlsrv_free_stmt($stmt);
sqlsrv_close($conn1);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Stock Transaction Count</title>
</head>
<body>
    <h1>Stock Transaction Count</h1>
    <p>The total number of stock transactions is: <?php echo $row['count']; ?></p>
</body>
</html>