<?php

include_once('config.php');

$sql = "SELECT DISTINCT process, COUNT(*) AS count FROM assembly GROUP BY process";
$result = mysqli_query($conn, $sql);

$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $process = $row['process'];
    $count = $row['count'];

    $entry = array(
        'process' => $process,
        'count' => $count
    );

    $data[] = $entry;
}

$jsonData = json_encode($data);

header('Content-Type: application/json');
echo $jsonData;
?>
