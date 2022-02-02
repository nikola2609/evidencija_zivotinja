<?php

     $user = 'root';
     $password = '';
     $server = 'localhost';
     $database = 'evidencija_zivotinja';


    $konekcija = new mysqli($server,$user,$password,$database);

    if($konekcija->connect_errno){
        exit('Neuspelo poveivanje sa bazom, greska: '. $konekcija->connect_error);
    }

?>