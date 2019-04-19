<?php
$to = "2018bit506@sggs.ac.in";
$subject = "Regarding to the efficiency of Power";
$txt = "Machine 2 consumption is exceeding the ideal power by 10% 
        Solution:
                1.";
$headers = "From: cmp15071999@iotbasedproj.dx.am". "\r\n" .
"CC: 2018bit506@sggs.ac.in";
;

if(mail($to,$subject,$txt,$headers)){
        echo 'E-mail message sent!';
    } 
    else {
        echo 'E-mail delivery failure!';
    }
?>