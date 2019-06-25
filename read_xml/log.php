<?php
function toLog($log){
$plik = __DIR__.'/log/log.txt'; //path to file 
$test = file_exists($plik); //check if the file exists
$dane = date('d.m.Y H:i:s').' | '. $log .' | '.$_SERVER['REMOTE_ADDR'].' | '. $_SERVER['PHP_SELF'].' | '.$_SERVER['HTTP_USER_AGENT']."\n";
if (!$test) { 
    // opening to add
    $fp = fopen($plik, 'a');
    // blockade file
    flock($fp, 2);
    // save file
    fwrite($fp, $dane);
    // unblocking file
    flock($fp, 3);
    //close file
    fclose($fp);
}
 else {
    //update
    //opening to add
    $fp = fopen($plik, 'a');
    //blockade file
    flock($fp, 2);
    //save file
    fwrite($fp, $dane);
    // unblocking file
    flock($fp, 3);
    //close file
    fclose($fp);
}
};