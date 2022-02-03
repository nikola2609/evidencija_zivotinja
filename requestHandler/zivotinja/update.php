<?php

require "../../Database.php";
require "../../model/Zivotinja.php";

if( isset($_POST['id']) &&
    isset($_POST['ime']) &&
    isset($_POST['vrsta_id']) &&
    isset($_POST['korisnik_id']) &&
    isset($_POST['otac_id']) &&
    isset($_POST['majka_id']) &&
    isset($_POST['datumRodjenja']) &&
    isset($_POST['status']) &&
    isset($_POST['napomena'])){

    $zivotinja = new Zivotinja($_POST['id'],$_POST['ime'],$_POST['vrsta_id'],
        $_POST['korisnik_id'],$_POST['otac_id'],$_POST['majka_id'],$_POST['datumRodjenja'],$_POST['pol'],$_POST['status'],$_POST['napomena']);

    $status = $zivotinja->update($konekcija);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>