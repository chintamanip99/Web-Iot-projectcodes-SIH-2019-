<?php
  //  //$mid=$_GET['mid'];
//$extra=$_GET['extra'];
   /* $from='cmp15071999@iotbasedproj.dx.am';
    $to='chintamanip99@gmail.com';
    $subject='Efficiency';
    $body='Inefficient Consumption of Machine 2';
    
    
    if(mail($to,$subject,$body,$from)){
        echo 'E-mail message sent!';
    } else {
        echo 'E-mail delivery failure!';
    }
   
    //header('bar.php');*/
    
    
    $from='cmp15071999@iotbasedproj.dx.am';
    $to='chintamanip99@gmail.com';
    $subject='PHP mail() Test';
    $body='This is a test message sent with the PHP mail function!';
    if(mail($to,$subject,$body,$from)){
        echo 'E-mail message sent!';
    } else {
        echo 'E-mail delivery failure!';
    }

 ?>