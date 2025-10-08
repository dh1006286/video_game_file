<?php
require __DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'functions.php';

$check = false;

if($_SERVER['REQUEST_METHOD'] === "POST")
{   
   
    $tmpfile = $_FILES['datafile'];

    $file = fopen($_FILES['datafile']['tmp_name'], 'rb');

    // Checking if dir data is in folder. If not, make one
    $pathDir = __DIR__ . DIRECTORY_SEPARATOR . 'data';

    if(!is_dir($pathDir))
    {
        mkdir($pathDir, 0755, true);
    }
    
    //set a path to data dir and make a games.csv file with the file the user uploaded.
    $destFile = $pathDir . DIRECTORY_SEPARATOR . 'games.csv';

    if(move_uploaded_file($_FILES['datafile']['tmp_name'], $destFile))
    {
        // Read the CSV file to get rows
        $rows = read_csv_rows($destFile);
        
    
        $check = write_csv_rows($destFile, $rows);   
    }
    fclose($file);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="styles.css" rel="stylesheet">
 
</head>
<body>
    <?php if($check):?>
        <h3>Looks Good!!!</h3>
        <?= "<a href='view.php'>Click me</a>"?>
    
    <?php endif?>
</body>
</html>