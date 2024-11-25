<?php 
namespace App\Helpers;

class FileExporter {
    public static function export($data) {
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="gim.txt"');
        foreach ($data as $key => $value) {
            echo "$key: $value\n";
        }
    }
}
?>