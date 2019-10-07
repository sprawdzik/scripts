<?php
//error_reporting(E_ALL);
//var_dump($_SERVER);
$post_data = $_POST['data'];
if (!empty($post_data)) {
    $dir = '';
    $file = uniqid().getmypid();
    $filename = date("His").'-'.$dir.$file.'.txt';
    $handle = fopen($filename, "w");
    fwrite($handle, $post_data);
    fclose($handle);
    echo "OK".$filename;
    //http_response_code(400);

}
?>