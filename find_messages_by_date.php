<?php
require_once 'config.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//$postdata = file_get_contents("php://input");
//$request = json_decode($postdata);
// Get user input for date
//$date = "'" . $request->user_input;

//$date = '2014';

$conn = new mysqli($host, $username, $password, $dbname) or die("Unable to connect to $host");

// Find messages by date query string.
$sql = "select date_format(acars.DATE_TIME, '%Y-%m-%d') AS DateTime, master.n_number AS N_NUMBER, acftref.MFR AS MANUFACTURER,
	acftref.TYPE_ACFT AS Plane_TYPE, acars.MSG_TEXT AS Data_TEXT,
    master.YEAR_MFR AS YEAR_MADE
	FROM master
join acars on master.n_number = acars.n_number
join	acftref on master.mfr_mdl_code = acftref.code WHERE acars.DATE_TIME LIKE '2014%' LIMIT 100";
//   join	acftref on master.mfr_mdl_code = acftref.code WHERE acars.DATE_TIME LIKE " . $date . "%' LIMIT 100";

$result = $conn->query($sql);

// Create JSON response
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"DateTime":"'  . $rs["DateTime"] . '",';
    $outp .= '"N_NUMBER":"'  . $rs["N_NUMBER"] . '",';
    $outp .= '"MANUFACTURER":"'  . $rs["MANUFACTURER"] . '",';
    $outp .= '"Plane_TYPE":"'  . $rs["Plane_TYPE"] . '",';
    $outp .= '"YEAR_MADE":"'  . $rs["YEAR_MADE"] . '",';
    $outp .= '"Data_TEXT":"'. $rs["Data_TEXT"]     . '"}';
}

$outp .="]";

$conn->close();

echo($outp);

?>