<?php
$str = array(
'Sobienie Kiełczewskie Pierwsze',
'Przedmieście Szczebrzeszyńskie',
'Leśniczówka Skarżysko Kościelne',
'Rondo Kombatantów Rzeczypospolitej Polskiej i Byłych Więźniów Politycznych',
'Park Zdrojowy im. Hrabiego Witolda Skórzewskiego w Konstancinie-Jeziornie',
'Skwer Niezależnego Samorządnego Związku Zawodowego "Solidarność"'

);


// split long string

// for ($i=0;$i<count($str);$i++){
//     echo $str[$i].' - characters: '.strlen($str[$i]).'</br>';

//     $nazwa = $str[$i];
//     if(strlen($nazwa)>35){
//                     $str1 = substr($nazwa, 0, 34);
//                     $str2 = substr($nazwa, 34);
//                     echo $str1 . "<br>";
//                     echo $str2 . "<br>";
//                     echo "<hr>"; 
//                     break;             
//     }else{
//         echo "less than 35 <hr>";
//     }
// };


// split string after space 

for ($i=0;$i<count($str);$i++){
    echo $str[$i].' | characters: '.strlen($str[$i]).'</br>';

    $nazwa = $str[$i];
    if(strlen($nazwa)>45){
        for($j = 20 ; $j < 45 ; $j++ )
            {
                if($nazwa[$j] == " ")
                {
                    $pos = $j;
                    $str1 = substr($nazwa, 0, $pos);
                    $str2 = substr($nazwa, $pos);
                    echo $str1 . "<br>";
                    echo $str2 . "<br>";
                    echo "<hr>"; 
                    break;             
                } 
            }
    }else{
        echo "less than 45 <hr>";
    }
};