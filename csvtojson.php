<?php

 function csvtojson($file,$delimiter)
    {
        if (($handle = fopen($file, "r")) === false)
        {
                die("can't open the file.");
        }
    
        $csv_headers = fgetcsv($handle, 4000, $delimiter);
        $csv_json = array();
    
        while ($row = fgetcsv($handle, 4000, $delimiter))
        {
                $csv_json[] = array_combine($csv_headers, $row);
        }
    
        fclose($handle);
        return json_encode($csv_json);
    }
