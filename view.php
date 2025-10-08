<?php
require __DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'functions.php';
// path to the csv file
$path = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'games.csv';
//If file exists import data in a array
if(file_exists($path)) {
    $rows = read_csv_rows($path);
} else {
    $rows = [];
    $error = "No data file found. Please upload a CSV file first.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require "includes" . DIRECTORY_SEPARATOR . "bootstrap.php" ?>
    
</head>
<body>
    <table class="table table-striped table-hover">
        <th>
            <tr>
                <td>Game ID</td>
                <td>Title</td>
                <td>Console</td>
                <td>Price</td>
                <td>Image</td>
            </tr>
        </th>
        <tBody>
            <!-- Display each csv row in a table -->
            <?php foreach($rows as $row): ?>
                    <tr>
                        <td><?= esc_html($row[0]) ?></td>
                        <td><?= esc_html($row[1]) ?></td>
                        <td><?= esc_html($row[2]) ?></td>
                        <td>$<?= esc_html(number_format((float)$row[3], 2)) ?></td>
                        <td><img src="<?= "img" . DIRECTORY_SEPARATOR . esc_html($row[4]) ?>" alt="Game cover" style="width: 100px;"></td>
                    </tr>
                <?php endforeach; ?>
        </tBody>
    </table>
</body>
</html>