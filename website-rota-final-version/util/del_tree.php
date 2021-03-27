<?php
class Delete{
public function deltree($dir){
    if (!empty($dir) && is_dir($dir)) {
        $dir = substr($dir, -1) != '/' ? $dir . '/' : $dir;
        $openDir = opendir($dir);
        while ($file = readdir($openDir)) {
            if (!in_array($file, array('.', '..'))) {
                if (!is_dir($dir . $file)) {
                    unlink($dir . $file);
                } else {
                    deltree($dir . $file);
                }
            }
        }
        closedir($openDir);
        rmdir($dir);
    }
 }
}
