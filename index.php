<?php 
function readPlainTextData($filePath) {
    if (file_exists($filePath)) {
        $data = file_get_contents($filePath);
        return $data;
    } else {
        return false;
    }
}
function readCSVData($filePath) {
    if (file_exists($filePath)) {
        $csvData = [];
        $file = fopen($filePath, 'r');
        if ($file !== false) {
            while (($row = fgetcsv($file)) !== false) {
                $csvData[] = $row;
            }
            fclose($file);
            return $csvData;
        }
    }
    return false;
}
function readJSONData($filePath) {
    if (file_exists($filePath)) {
        $jsonData = file_get_contents($filePath);
        if ($jsonData !== false) {
            $dataArray = json_decode($jsonData, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                return $dataArray;
            }
        }
    }
    return false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NaturaTech Solutions</title>
</head>
<body>
    <h1>NaturaTech Solutions Inc.</h1>
    <br>
    <h2>Overview:</h2>
    <p><?php echo readPlainTextData('lib\overview.txt')?></p>
    <h2>Mission Statement: </h2>
    <p> <?php echo readPlainTextData('lib\missionstatement.txt')?> </p>
    <h2>Key Products & Services:</h2>
    <h2>Awards: </h2>
    <p><?php echo readPlainTextData('lib\awards.txt') ?></p>
    <h2>Team:</h2>
    <p> <?php print_r(readJSONData('lib\team.json')) ?></p>
</body>
</html>