<?php

require "../../Database.php";
require "../../model/VrstaZivotinje.php";

if(isset($_POST['naziv']) &&
    isset($_POST['vrsta']) &&
    isset($_POST['opis'])){

    $vrsta = new VrstaZivotinje(null,$_POST['naziv'],$_POST['vrsta'],
        $_POST['opis']);

    $status = $vrsta->add($konekcija);

    if($status){
        echo"Uspesno";
    }else{
        echo "Neuspesno";
    }

}


?>