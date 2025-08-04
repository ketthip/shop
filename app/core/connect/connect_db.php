<?php

try{
    $pdo = new PDO('mysql:host=localhost;dbname=posdb','root','123456789');
    //echo 'Connection Successfull';
}catch(PDOException $error){
    echo $error->getmessage();
}


?>
