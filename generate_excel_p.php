<?php
include 'database.php';
$pdo = database::connect();

$sql = "SELECT * FROM R_Profesor";
$results = $pdo->query($sql, PDO::FETCH_NUM);

$columns = [];

for ($i = 0; $i < $results->columnCount(); $i++) {
    $columns[] = $results->getColumnMeta($i)['name'];
}

$contentType = 'application/csv';
$outputFileExtension = 'csv';

header("Content-Type:$contentType"); 
header("Content-Disposition:attachment;filename=profesores-expo-ing.$outputFileExtension"); 

$outputFile = fopen('php://output', 'w+');

fputcsv($outputFile, $columns);
foreach ($results as $result) {
    fputcsv($outputFile, $result);
}

fclose($outputFile);

?>
