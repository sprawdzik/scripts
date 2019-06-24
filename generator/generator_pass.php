<?php

if(isset($_GET['number']) && $_GET['number']>=8 && is_numeric($_GET['number']))
{
    $length = $_GET['number'];
    $pass="";
    $pass_ascii="";
    
    for($i=0;$i<$length;$i++){        
        
        $j=rand(0,2);
        switch ($j) {
            case 0:
                //digits
                generator(48, 57);
                break;
            case 1:
                //upper
                generator(65, 90);
                break;
            case 2:
                //lower
                generator(97, 122);
                break;
        }
        
        
    }
    
    echo "Pssword: " . $pass . "<br>";    
    echo "Date: " . time() . "<br>";
    echo "Pssword (md5): " . hash('md5', $pass, FALSE) . "<br>";
    echo "<hr>";
    echo "Pssword (ASCII): " . $pass_ascii . "<br>";
    echo "Pssword (sha1): " . hash('sha1', $pass, FALSE) . "<br>";
    echo "Pssword (sha256): " . hash('sha256', $pass, FALSE) . "<br>";
    echo "Pssword (sha512): " . hash('sha512', $pass, FALSE) . "<br>";
    echo "Date: " . date("Y-m-d H:i:s") . "<br>";


}else{
    echo "Min password length 8";
}

function generator(int $rangeFrom,int $rangeTo){
    $pass_rand = rand($rangeFrom,$rangeTo);
    global $pass;
    $pass .= chr($pass_rand);
    global $pass_ascii;
    $pass_ascii .= $pass_rand . " | "; 
}

?>
<form action="" method="GET">
    <label for="number">Enter the length of the password (min. 8)</label>
    <input type="number" id="number" name="number" value="8">
    <input type="submit">
</form>
