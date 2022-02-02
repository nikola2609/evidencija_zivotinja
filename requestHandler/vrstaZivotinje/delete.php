<?php

require "../../Database.php";
require "../../model/VrstaZivotinje.php";

if(isset($_POST['id'])){

    $vrsta = new VrstaZivotinje($_POST['id']);

    $status = $vrsta->delete($konekcija);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>