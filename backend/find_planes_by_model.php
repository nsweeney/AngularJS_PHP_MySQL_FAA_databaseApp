<?php
require_once 'config.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// check username or password from database
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
// Get user input for plane model
$modelTemp = "'" . $request->user_input;

$conn = new mysqli($host, $username, $password, $dbname) or die("Unable to connect to $host");

// Find planes by type query string.
$sql = "select date_format(acars.DATE_TIME, '%Y-%m-%d') AS DateTime, acftref.MFR AS Manufacturer,
acftref.model AS Model, acars.MSG_TEXT AS MSG FROM master join acars on master.n_number = acars.n_number
join acftref on master.mfr_mdl_code = acftref.code
WHERE acftref.model LIKE " . $modelTemp . "%' AND master.year_mfr REGEXP '[0-9]+' LIMIT 100";

$result = $conn->query($sql);

// Create JSON response
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"DateTime":"'  . $rs["DateTime"] . '",';
    $outp .= '"Manufacturer":"'  . $rs["Manufacturer"] . '",';
    $outp .= '"Model":"'  . $rs["Model"] . '",';
    $outp .= '"MSG":"'. $rs["MSG"]     . '"}';
}

$outp .="]";

$conn->close();

echo($outp);

?>