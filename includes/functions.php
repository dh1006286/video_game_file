<?php
    function esc_html($text)
    {
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    }
    function read_csv_rows($path)
    {
        $file = fopen($path, 'rb');

        while(($row = fgetcsv($file)) !== false)
        {
            $fileArray[] = $row;
        }
        fclose($file);
        return $fileArray;

    }
    function write_csv_rows($path, $rows)
    {
        $file = fopen($path, 'wb');     
        
        foreach($rows as $row)
        {
            fputcsv($file, $row);
        }
        fclose($file);
        return true;
    }
?>

