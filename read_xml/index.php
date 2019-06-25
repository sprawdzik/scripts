<!DOCTYPE html>
<html lang="pl">
<html>
<head>
  <meta charset="utf-8">
  <title>Read XML</title>
<style>
th, td {
    border: 1px solid black;
}
p {
	text-align: center;
}
</style>
</head>
<body>



<?php
require_once 'log.php';
// set_time_limit(0);
// error_reporting(0);
$dir = 'xml';
$files=[];

$contentCatalogue = array_diff(scandir($dir), array('..','.','arch'));
if(sizeof($contentCatalogue)>0){
    
    foreach ($contentCatalogue as $fileXML) {
        $dateCreate= date ("U", filemtime($dir.'/'.$fileXML));
        $dateNow = time();

        if( $dateNow - $dateCreate >= 60 * 60 * 24 * 31 * 3) { // seconds * minutes * hours * days * days * months
            // echo "old file " . $fileXML;
            if(rename($dir.'/'.$fileXML, $dir.'/arch/'.'arch_'.$fileXML)){
                 echo "File moved: " . $fileXML."<br>";
                 toLog("File moved: " . $fileXML." => arch_".$fileXML);
                }
        }else{
            $files[] = $fileXML;
        }
    }
}else{
    echo "empty";
}

echo "Reading files: " . count($files) .'<br>';

$i=1;
$start = date('H:i:s');
// header table
echo '<table>
        <tr>
            <td>#</td>
            <td>File</td>
            <td>CompanyOrName</td>
            <td>Address1</td>
            <td>Address2</td>
            <td>CityOrTown</td>
            <td>PostalCode</td>
            <td>Telephone</td>
            <td>Reference1</td>
            <td>TrackingNumber</td>
            <td>Date send</td>
        </tr>';

foreach ($files as $file) {
    $adres = $dir.'/'.$file;

    if (file_exists($adres)) {
        $xml = simplexml_load_file($adres);
        echo '<tr><td>'.$i.'</td>';
        echo '<td>'.$file.'</td>';
        rowXML($xml -> OpenShipment -> ShipTo -> CompanyOrName,'CompanyOrName');
        rowXML($xml -> OpenShipment -> ShipTo -> Address1,'Address1');
        rowXML($xml -> OpenShipment -> ShipTo -> Address2,'Address2');
        rowXML($xml -> OpenShipment -> ShipTo -> CityOrTown,'CityOrTown');
        rowXML($xml -> OpenShipment -> ShipTo -> PostalCode,'PostalCode');
        rowXML($xml -> OpenShipment -> ShipTo -> Telephone,'Telephone');
        rowXML($xml -> OpenShipment -> ShipmentInformation -> Reference1,'Reference1');
        rowXML($xml -> OpenShipment -> ShipmentInformation -> TrackingNumbers -> TrackingNumber,'TrackingNumber');  
        echo '<td>'. date("Y-m-d H:i:s", filemtime($adres)) .'</td>';
        echo '</tr>';

        $i++;

    } else {
        exit('Failed to open xml.');
    }
}
echo '</table>';

$end = date('H:i:s');
echo ' start:'. $start .' - end: '.$end;



function rowXML($data,$col){
    if(count($data)>0){
        echo '<td>' . $data . '</td>' ;
    }else{
        echo '<td>' . $col . '</td>' ;
    }
}