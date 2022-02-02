<?php

require "../../Database.php";
require "../../model/VrstaZivotinje.php";

if( isset($_POST['id']) &&
    isset($_POST['naziv']) &&
    isset($_POST['vrsta']) &&
    isset($_POST['opis'])){
    $vrsta = new VrstaZivotinje($_POST['id'],$_POST['naziv'],$_POST['vrsta'],
        $_POST['opis']);

    $status = $vrsta->update($konekcija);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>